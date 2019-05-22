<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Form;

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

    public function json_user(){
        // return Datatables::of(Category::all())->make(true);


        $user = User::all();
        return Datatables::of($user)
        ->addColumn('action', function ($users) {
            return '<form action="'. route('user.destroy', $users->id) .'" method="POST" class="text-center">
            <a href="' . route('user.edit', $users->id) . '" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a>
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
            <button type="submit" class="btn btn-xs btn-danger btn-label" onclick="javascript:return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i>
            Hapus</button>
            </form>
            ';
        })
        ->make(true);
    }

    public function index()
    {
        // $data = User::orderBy('created_at', 'desc')->paginate(5);
        return view('user.index');
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
