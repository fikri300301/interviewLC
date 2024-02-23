<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Mail\WordDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class WordController extends Controller
{
    public function index(){
        $meanings = session('meanings', []);
        return view('dashboard.dictionary.index', compact('meanings'));
    }

    public function store(Request $request)
{
    $request->validate([
        'word' => 'required',
    ], [
        'word.required' => 'Word is required',
    ]);

    $user = auth()->user();
    $word = Word::where('word', $request->word)->where('user_id', $user->id)->first();

    if ($word) {
        // Jika kata sudah ada di database, ambil definisi dari database
        $meanings = [
            'word' => $word->word,
            'meanings' => [['definition' => $word->definition]]
        ];
    } else {
        // Jika kata belum ada di database, cari definisi menggunakan API
        $response = Http::get('https://api.dictionaryapi.dev/api/v2/entries/en/'.$request->word);

        if ($response->successful()) {
            $meaning = $response->json();
            $definitions = [];

            foreach ($meaning[0]['meanings'] as $meaning) {
                $definitions[] = $meaning['definitions'][0]['definition'];
            }

            // Simpan kata dan definisinya ke database
            $word = $user->words()->create([
                'word' => $request->word,
                'definition' => implode("\n", $definitions)
            ]);


            //kirim email ke user
            Mail::to($user->email)->send(new WordDefinition($request->word,$definitions));

            $meanings = [
                'word' => $word->word,
                'meanings' => [['definition' => implode("\n", $definitions)]]
            ];
        } else {
            // Handle kesalahan jika permintaan tidak berhasil
            echo "Failed to retrieve meaning for the word.";
            return redirect('/dictionary');
        }
    }

    // Simpan data dalam session
    $request->session()->put('meanings', $meanings);
    $request->session()->save();

    return redirect('/dictionary');
}

    public function show(){

        $user = auth()->user();
        $words = $user->words()->paginate(10);
        return view('dashboard.history.index', compact('words'));
    }

    public function destroy($id){
        $user = auth()->user();
        $word = Word::find($id);
        $word->delete();
        return redirect('/history');
    }
}