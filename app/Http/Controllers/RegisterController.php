<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){
        return view('Register');
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'password' => 'required|min:4'
        ],[
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 4 karakter.',
        ]);

        $request['password'] = Hash::make($request->password);
        
        $user = User::create($request->all());
        Session::flash('status', 'success');
        Session::flash('message', 'register success.Wait admin for approval');

        return redirect('/');

    }
}