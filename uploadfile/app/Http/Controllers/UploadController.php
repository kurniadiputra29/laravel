<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gambar;
use File;

class UploadController extends Controller
{
	public function index()
	{
		$data = Gambar::get();
		return view('index', compact('data'));
	}
    public function upload(){
		return view('create');
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		Gambar::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
		]);
 
		return redirect('/index');
	}
	public function hapus($id)
	{
		// hapus file
		$gambar = Gambar::where('id',$id)->first();
		File::delete('data_file/'.$gambar->file);
	 
		// hapus data
		Gambar::where('id',$id)->delete();
	 
		return redirect()->back();
	}
	public function edit($id)
	{
		$data = Gambar::find($id);
		return view('edit', compact('data'));
	}
	public function update(Request $request, $id)
	{
		if (empty($request->file)) {
			$data = Gambar::find($id);
			$data->keterangan = $request->keterangan;
			$data->save();
			return redirect('/index');
		} else {
			$data = Gambar::find($id);
			
			$file = $request->file('file');
			$nama_file = time()."_".$file->getClientOriginalName();

			$tujuan_upload = 'data_file';
			$file->move($tujuan_upload,$nama_file);

			// hapus file
			$gambar = Gambar::where('id',$id)->first();
			File::delete('data_file/'.$gambar->file);

			$data->file = $nama_file;
			$data->keterangan = $request->keterangan;
			$data->save();
			return redirect('index');
		}
		
	}
}
