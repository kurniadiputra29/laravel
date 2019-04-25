<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Provinsi; // untuk mengakses databases

class ProvinsiController extends Controller
{
    public function index()
    {
    	$data['provinsi'] = Provinsi::orderBy('id', 'desc')->paginate(5);
    	return view('admin.provinsi.index', $data);
    }
    public function create()
    {
    	return view('admin.provinsi.create');
    }
    public function store(Request $request)
    {
        $messages =[
            'required' => ':attribute wajib diisi cuy!!!',
        ];
        $this->validate($request,[
            'name' => 'required',
        ],$messages);
    	$provinsi = new Provinsi;
    	$provinsi->name = $request->name;
    	$provinsi->save(); 
    	return redirect('admin/provinsi')->with('Success', 'Data anda telah terinput !');
    }
    public function edit($id)
    {
        $provinsi = Provinsi::find($id);
        return view('admin.provinsi.edit', compact('provinsi'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $provinsi = Provinsi::find($id); 
        $provinsi->name = $request->name;
        $provinsi->save();
        return redirect('admin/provinsi')->with('Success', 'Data anda telah teredit !');
    }
    public function delete($id)
    {
        $provinsi = Provinsi::find($id)->delete();
        return redirect('admin/provinsi')->with('Success', 'Data berhasil di hapus !');
    }
}
