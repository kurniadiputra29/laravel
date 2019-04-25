<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SantriModel; // untuk mengakses databases

class SantriController extends Controller
{
    // public function index() // cara lama
    // {
    // 	return view('admin.santi.index');
    // }
    // public function create()
    // {
    // 	return view('admin.santi.create');
    // }
    public $folder = 'admin.santri'; // cara cepat dengan di berikan $folder di situ
    public function index()
    {	// paginete digunakan untuk memilih berapa data yang mau muncul
    	$data['santri'] = SantriModel::orderBy('id', 'desc')->paginate(5); // seperti query sql
    	return view($this->folder .'.index', $data);
    }
    public function create()
    {
    	return view($this->folder .'.create');
    }
    public function store(Request $request)//
    {
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
            'email' => ':attribute email anda salah !!!'
        ];
         
        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'email' => 'required|email|unique:santri,email',
            'gender' => 'required',
            'password' => 'required|min:5|max:10',
            'provinsi_id' => 'required',
        ],$messages);
        // cara cepat
        // $santri = SantriModel::create($request->all());
    	$santri 			= new SantriModel;
    	$santri->nama 		= $request->nama;
    	$santri->email 		= $request->email;
    	$santri->gender 	= $request->gender;
    	$santri->password 	= bcrypt($request->password);
        $santri->provinsi_id= $request->provinsi_id;
    	$santri->save();
    	return redirect('admin/santri')->with('Success', 'Data berhasil di input !'); // untuk mengembalikan ke admin/santri/index
    	// 1 width ini di tampilkan
    	// 2 form validation
    	// 3 pengaplikasian ke AdminLTE pada index dan create
        // Aturan dalam membuat judul 
        // 1. Nama table : articles
        // 2. Model : Articles
        // 3. Controller : ArticleController
    }

    public function edit($id)
    {
    	$santri = SantriModel::find($id);
    	return view($this->folder.'.edit', compact('santri'));
    }
    public function update(Request $request)
    {
        $id                 = $request->id;
        $messages =[
            'required' => ':attribute wajib diisi cuy!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
            'email' => ':attribute email anda salah !!!',
        ];
        $this->validate($request,[
            'id'    => 'required',
            'nama' => 'required|max:20|min:5',
            'email' => 'required|email|unique:santri,email,'.$id,// tambahkan $id untuk dirinya sendiri
            'gender' => 'required',
            'password' =>'nullable|min:5|max:10',
            'provinsi_id' => 'required',
        ],$messages);
        // cara cepat
        // SantriModel::find($id)->update($request->all());
    	$santri 			= SantriModel::find($id);
    	$santri->nama 		= $request->nama;
    	$santri->email 		= $request->email;
    	$santri->gender 	= $request->gender;
    	$santri->password 	= bcrypt($request->password);
        $santri->provinsi_id= $request->provinsi_id;
    	$santri->save();
    	return redirect('admin/santri')->with('Success', 'Data berhasil di Edit !');
    }
    public function delete($id)
    {
    	$santri = SantriModel::find($id)->delete();
    	return redirect('admin/santri')->with('Success', 'Data berhasil di hapus !');
    }
}
