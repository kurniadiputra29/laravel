<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tugas extends Controller
{
	public $panjang;
	public $lebar;
    public function nama($nama)
    {
    	return view('artikel.index', ['nama' => $nama]);
    }
    public function proses(Request $request) //sama dengan $request = new Request
    {
    	$panjang = $request->panjang;
        $pn = $panjang / 2;
        $lebar = $request->lebar;
        $l = $lebar / 2;
        $luas = $panjang * $lebar;


    	//return $panjang . ' & ' . $lebar;
    	 return view('artikel.hasil', ['luas' => $luas, 'panjang' => $panjang, 'lebar' => $lebar, 'pn' => $pn, 'l' => $l]); //cara lama
    	// return view('pendaftaran.formulir.index', compact('panjang','lebar')); // cara cepat
    	//return redirect('/formulir');
    }
}
