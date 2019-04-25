<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
    public function loginform()
    {
    	return view('auth.login');
    }
    public function login(Request $request)
    {
    	$credentials = $request->only('email', 'password');
    	$check = Auth::attempt($credentials);

    	if ($check) {
    		return redirect()->intended('/santri');
    	} else {
            return redirect('/login');
    		//return 'Password atau Email anda Salah';
    	}
    }
    public function logout()
    {
    	Auth::logout();

    	return redirect('/login');
    }
}
