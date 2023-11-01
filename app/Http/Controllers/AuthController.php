<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('backend.pages.auth.register');
    }

    public function registerPost(Request $request){

       
        
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        
        return redirect()->route('register')->with('success', 'Register successfully');

    }

    public function login() {
        return view('backend.pages.auth.login');
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Login successfully');
        }
        
        return back()->with('error', 'Email or pass fail');

    }
  
}
