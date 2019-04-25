<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('created_at', 'desc')->paginate(5);
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $data->email  = $request->email;
        $data->password    = bcrypt($request->password);

        $nama_file = $request->file('foto');
        $path = $nama_file->store('public/foto'); // ini akan tersimpan pada storage, app, public, files.
        $data->foto = $path;
        $data->save();
        return redirect('/admin/user')->with('Success', 'Data anda telah berhasil di input !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->foto)) {
            $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter !!!',
            ];
            $this->validate($request,[
                'name' => 'required',
                'email' => 'unique:users,email,'.$id,
                'password' => 'nullable|min:5', 
            ],$messages);

            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save(); 
            return redirect('/admin/user')->with('Success', 'Data anda telah berhasil di edit !');
        } else {
            $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter !!!',
            ];
            $this->validate($request,[
                'foto' => 'required',
                'name' => 'required',
                'email' => 'unique:users,email,'.$id,
                'password' => 'nullable|min:5', 
            ],$messages);

            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);

            $nama_file = $request->file('foto');
            $path = $nama_file->store('public/foto'); // ini akan tersimpan pada storage, app, public, files.

            // hapus file
            $data = User::find($id);
            Storage::delete($data->foto);

            $data->foto = $path;
            $data->save();
            return redirect('/admin/user')->with('Success', 'Data anda telah berhasil di edit !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $data = User::find($id);
        Storage::delete($data->foto);

        User::find($id)->delete();
        return redirect('/admin/user');
    }
}
