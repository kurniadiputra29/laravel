<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest')->except('logout', 'form', 'login');
    }
    public function form()
    {
    	return view('layouts.login');
    }
    public function login(Request $request)
    {
    	$credentials = $request->only('email','password');
    	//return $credentials;//untuk mengecek credentials => bentuknya objek
    	$check = Auth::attempt($credentials); //untuk cek
    	if ($check) {
    		return redirect()->intended('/admin/dashboard');
    	} else {
    		return 'login gagal !';
    	}
    }
    public function logout()
    {
    	Auth::logout();
        return redirect('/form');
    }
}
