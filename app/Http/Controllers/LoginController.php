<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{


    public function index(){
        return view('Login');
    }
    public function login(Request $request){

      //  dd($request->all());
        $request->validate([
            'email' =>'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email is required',
            'password.require' => 'password is not valid',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::attempt($credentials)){
            //berhasil
            return redirect('/dashboard');
           
        }else{

           return redirect('/')->with('error','Email or password is not valid');
        }
  
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}