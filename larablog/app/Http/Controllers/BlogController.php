<?php
namespace App\Http\Controllers; // namespace harus sama dengan nama folder

use Illuminate\Http\Request; // request ini adalah bawaan.

class BlogController extends Controller
{
	// public function ucapan()
	// {
	// return "Controller Untuk Jembatan";
	// }
	public function ucapan()
	{
		$nama = "Kurniadi";

		$makfav = ["Gado-gado", "Mi Ayam", "Nasi Putih", "Kerupuk Putih"];
		return view('ucapan', ['nama' => $nama, 'makanans' => $makfav]);//nama ini untuk di panggil di html. Dan $ nama di ambil dari variabel 
	}
}
?>