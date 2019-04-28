<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Payment;
use App\Model\Product;
use App\Model\User;
use App\Model\OrderDetail;
use PDF;

class LaporanController extends Controller
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
        $users  = User::all();
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);
        return view('laporan.index', compact('orders', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request)
    {
        $users  = User::all();
        $tahun = $request->year;
        $bulan = $request->month;
        $user  = $request->kasir;
        $orders = Order::where('user_id', "$user")->whereYear('created_at', '=', date("$tahun"))->whereMonth('created_at', '=', date("$bulan"))->paginate(5);
        return view('laporan.index', compact('orders', 'users'));
    }
    public function download(Request $request)
    {
        if ($request->document_type == 1) {
            $users  = User::all();
            $tahun = $request->year;
            $bulan = $request->month;
            $user  = $request->kasir;
            $orders = Order::where('user_id', "$user")->whereYear('created_at', '=', date("$tahun"))->whereMonth('created_at', '=', date("$bulan"))->paginate(5);
            $pdf = PDF::loadView('laporan.pdf', compact('orders', 'users'));
            // return $pdf->download('customers.pdf');
            return $pdf->stream();
        } else {
            return $request;
        }
        

        // if (!empty($request->bulan)) {
        //     // $pisah = explode(' - ', $request->letter_entry);
        //     // $from = Carbon::parse($pisah[0])->format('Y-m-d H:i:s');
        //     // $to = Carbon::parse($pisah[1])->format('Y-m-d').' 24:60:60';
        //     // dd($pisah);
        //     $data['type'] = 1;
        //     $data['data'] = $this->table
        //                     ->whereMonth('letter_entry', $request->bulan)
        //                     ->whereYear('letter_entry', $request->tahun)
        //                     ->get();
        //     $pdf = PDF::loadView($this->folder.'.download_all', $data);
        //     return $pdf->setPaper('a4', 'landscape')->download(time().'.pdf');
        // }
    }
}
