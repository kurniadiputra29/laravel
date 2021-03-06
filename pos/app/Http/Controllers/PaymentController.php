<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Payment;
use DataTables;
use Form;

class PaymentController extends Controller
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

    public function json_payment(){
        // return Datatables::of(Category::all())->make(true);


        $payment = Payment::all();

        return Datatables::of($payment)
        ->addColumn('action', function ($payments) {
            return '<form action="'. route('payment.destroy', $payments->id) .'" method="POST" class="text-center">
            <a href="' . route('payment.edit', $payments->id) . '" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a>
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
        // $data = Payment::orderBy('created_at', 'desc')->paginate(5);
        return view('payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
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
            'name' => 'required'
        ],$messages);
        Payment::create($request->all());

        return redirect('/admin/payment')->with('Success', 'Data anda telah berhasil di input !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Payment::find($id);
        return view('payment.edit', compact('data'));
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
            'name' => 'required'
        ],$messages);
        $data = Payment::find($id);
        $data->update($request->all());
        return redirect('/admin/payment')->with('Success', 'Data anda telah berhasil di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::find($id)->delete();
        return redirect('/admin/payment')->with('Success', 'Data anda telah berhasil di Hapus !');
    }
}
