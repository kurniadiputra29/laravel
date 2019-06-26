<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use DataTables;
use Form;

class ItemController extends Controller
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

    public function json_item(){

        $product = Product::all();
        return Datatables::of($product)
        ->addColumn('category', function($products){
            return $products->category->name;
        })
        ->addColumn('action', function ($products) {
            return '<form action="'. route('item.destroy', $products->id) .'" method="POST" class="text-center">
            <a href="' . route('item.edit', $products->id) . '" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a>
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
            <button type="submit" class="btn btn-xs btn-danger btn-label" onclick="javascript:return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i>
            Hapus</button>
            <a href="' . route('item.trash', $products->id) . '" class="btn btn-xs btn-info"><i class="fa fa-trash-o"></i> Trash</a>
            </form>
            ';
        })
        ->make(true);
    }

    public function index()
    {
        // $data = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('item.index');
    }

    public function trash()
    {
        $data1 = Product::onlyTrashed()->get();
        return view('item.trash', compact('data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::orderBy('id', 'asc')->get();
        return view('item.create', compact('data'));
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
            'required' => ':attribute wajib diisi !!!'
        ];
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required'
        ],$messages);
        Product::create($request->all());
        return redirect('/admin/item')->with('Success', 'Data anda telah berhasil di input !');
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
        $data = Category::orderBy('id', 'asc')->get();
        $data1 = Category::find($id);
        $data2 = Product::find($id);
        return view('item.edit', compact('data1', 'data2', 'data'));
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
        $messages = [
            'required' => ':attribute wajib diisi !!!'
        ];
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required'
        ],$messages);
        $data = Product::find($id);

        $data->update($request->all());
        return redirect('/admin/item')->with('Success', 'Data anda telah berhasil di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('/admin/item');
    }
    public function forceDelete($id)
    {
        Product::where('id', $id)->forceDelete();
        return redirect('/admin/item');
    }
}
