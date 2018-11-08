<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required',
            'lastname'	=>	'required',
            'email'	=>	'required|email|unique:users',
            'password'	=>	'required'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email',
            'password'	=>	'required'
        ]);

        if(Auth::attempt([
            'email'	=>	$request->get('email'),
            'password'	=>	$request->get('password')
        ]))
        {
            return redirect('/');
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public static function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
