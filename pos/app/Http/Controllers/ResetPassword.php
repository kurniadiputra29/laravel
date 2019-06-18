<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;

class ResetPassword extends Controller
{
    public function send(Request $request)
    {
    	
    	$id = $request->id;

    	Mail::to($request->input('email'))->send(new SendMail($id));
    	return redirect('admin/order')->with('Success', 'Email telah berhasil dikirim, cek email Anda !');
    }
}
