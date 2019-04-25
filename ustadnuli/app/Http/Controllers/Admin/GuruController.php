<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GuruModel; // untuk mengakses databases

class GuruController extends Controller
{
	public $folder = 'admin.guru';
    public function index()
    {
    	$data['guru'] = GuruModel::orderBy('id', 'desc')->paginate(5);
    	return view($this->folder.'.index', $data);
    }
    public function create()
    {
    	return view($this->folder.'.create');
    }
    public function store(Request $request)
    {
    	$messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
            'email' => ':attribute email anda salah !!!'
        ];
    	$this->validate($request,[
    		'name' => 'required|min:5|max:20',
    		'NIP' => 'required',
    		'gender' => 'required',
    		'phone' => 'required',
    		'email' => 'email'
    	]);
    	$guru 			= new GuruModel;
    	$guru->name 	= $request->name;
    	$guru->NIP 		= $request->NIP;
    	$guru->gender 	= $request->gender;
    	$guru->phone 	= $request->phone;
    	$guru->email 	= $request->email;
    	$guru->save();
    	return redirect('admin/guru')->with('Success', 'Data anda telah berhasil di input !');
    }
    public function edit($id)
    {
    	$guru = GuruModel::find($id);
    	return view($this->folder.'.edit', compact('guru'));
    }
    public function update(Request $request)
    {
    	$messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
            'email' => ':attribute email anda salah !!!'
        ];
    	$this->validate($request,[
    		'id' => 'required',
    		'name' => 'required|min:5|max:20',
    		'NIP' => 'required',
    		'gender' => 'required',
    		'phone' => 'required',
    		'email' => 'email'
    	]);
    	$id 			= $request->id;
    	$guru 			= GuruModel::find($id);
    	$guru->name 	= $request->name;
    	$guru->NIP 		= $request->NIP;
    	$guru->gender 	= $request->gender;
    	$guru->phone 	= $request->phone;
    	$guru->email 	= $request->email;
    	$guru->save();
    	return redirect('admin/guru')->with('Success', 'Data anda telah berhasil di edit !');
    }
    public function delete($id)
    {
        $guru = GuruModel::find($id)->delete();
        return redirect('admin/guru')->with('Success', 'Data anda telah berhasil di hapus !');
    }
}
