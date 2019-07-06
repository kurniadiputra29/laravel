<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetMail;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest')->except('logout', 'form', 'login', 'showEmail', 'resetpass', 'confirmpass', 'register');
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
        return redirect('/login');
    }
    public function showEmail()
    {
        return view('layouts.email');
    }

    public function resetpass(Request $request)
    {
        $resetpass = $request->email;
        
        // $coba = User::all('email');
        $users = User::where('email', $resetpass)->get();
        $users_count = User::where('email', $resetpass)->count();
        
        if ($users_count > 0 ) {
            Mail::to('kurniadiputra29@gmail.com')->send(new ResetMail($resetpass));
            return redirect('admin/resetpassword')->with('Success', 'Email telah berhasil dikirim, cek email Anda !');

            // return view('ubah.sendmail', compact('users'));
        } else {
            return back()->with('Gagal', 'Email Anda Tidak Terdaftar !!');
        }
    }
    public function confirmpass(Request $request)
    {
        $id = $request->id;
        $users = User::find($id);
        return view('ubah.confirmasi', compact('users'));

        // $resetpass = $request->email;
        // $data1 = $request->password;

        // $data = User::where('email', $resetpass)->get();
        // $data->email = $request->email;
        // $data->password = bcrypt($request->password);
        // $data->save(); 
        // return redirect('/form');


        // $id = $request->email;
        // $ida = User::where('email', $id)->get('id');
        
        // $data = User::find($ida);
        // return $data;


        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->password = bcrypt($request->password);
        // $data->save(); 
        // return redirect('/form')->with('Success', 'Data anda telah berhasil di input !');
    }
    public function update(Request $request)
    {
            $id = $request->id;
            $data = User::find($id);
            $data->password = bcrypt($request->password);
            $data->save(); 
            return redirect('/login')->with('Success', 'Password anda telah berhasil di reset !');
    }
    public function register(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter !!!',
        ];
        $this->validate($request,[
            'foto' => 'required',
            'name' => 'required',
            'email' => 'unique:users,email|required',
            'password' => 'required|min:5', 
        ],$messages);
        
        $data           = new User;
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->password = bcrypt($request->password);

        $nama_file = $request->file('foto');
        $path = $nama_file->store('public/foto'); // ini akan tersimpan pada storage, app, public, files.
        $data->foto = $path;
        $data->save();
        return redirect('/login')->with('Success', 'Data anda telah berhasil di input !');
    }
}
