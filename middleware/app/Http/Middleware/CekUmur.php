<?php

namespace App\Http\Middleware;

use Closure;

class CekUmur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)//unutk menyortir request yang datang
    {
        if ($request->umur < 18 ){
            return redirect()->back();//untuk mengembalikan jika di bawah 18 tahun 
        }
        return $next($request);//untuk meneruskan request yang datang
    }
}
