<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');//halaman ini tidak bisa di cek ketika sudah login dan logout baru bisa di cek ketka sudah login.
	}

    public function form()
    {
    	return view('login');
    }
    public function login(Request $request)
    {
    	$credentials = $request->only('email', 'password');
    	$check =Auth::attempt($credentials);

    	if ($check) {
    		return redirect()->intended('/users');
    	}else {
    		return 'login gagal';
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/form');
    }
}
