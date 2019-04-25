<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //untuk nangkap dan ini plagin dari laravel

class PegawaiController extends Controller
{
    public $nama;
	public $hp;

    public function index($nama)
    {
    	return $nama;
    }
    public function pangkat($angka)
    {
    	return $angka * $angka;
    }
    public function formulir()
    {
    	$nama = $this->nama;
    	$hp = $this->hp;

    	//return view('pendaftaran.formulir.index'); mengarahkan field ke view/pendaftaran/formulir/index
    	return view('pendaftaran.formulir.index', ['nama' => $nama, 'hp' => $hp]);
    }
    public function proses(Request $request) //sama dengan $request = new Request
    {
    	$this->nama = $request->nama;
    	$this->hp = $request->hp;

    	// return $nama . ' & ' . $hp;
    	// return view('pendaftaran.formulir.index', ['nama' => $nama, 'hp' => $hp]); //cara lama
    	// return view('pendaftaran.formulir.index', compact('nama','hp')); // cara cepat
    	return redirect('/formulir');
    }
}
