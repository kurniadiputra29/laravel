<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Payment;
use App\Model\Product;
use App\Model\User;
use App\Model\OrderDetail;

class OrderController extends Controller
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

        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('order.index', compact('orders', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::orderBy('id', 'asc')->get();
        $user = User::orderBy('id', 'asc')->get();
        $payment = Payment::orderBy('id', 'asc')->get();
        return view('order.create', compact('product', 'user', 'payment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        $product                = Product::find($request->product_id);

        $count                  = count($request->product_id);
        $qty                    = $request->quantity;
        $note                   = $request->note;

        $request->merge([
            'user_id'           => auth()->user()->id,
        ]);

        $order                  = $request->only('user_id', 'payment_id', 'table_number');
        $orderData              = Order::create($order);
        
        for ($i=0; $i<$count; $i++) {
            $request->merge([
                'order_id'      => $orderData->id,
                'product_id'    => $product[$i]->id,
                'quantity'      => $qty[$i],
                'subtotal'      => $product[$i]->price * $qty[$i],
                'note'          => $note,
            ]);
            $orderDetail        = $request->only('order_id', 'product_id', 'quantity', 'subtotal', 'note');
            OrderDetail::create($orderDetail);
        }

        $orderTotal             = OrderDetail::where('order_id', $orderData->id)->sum('subtotal');

        Order::find($orderData->id)->update([
            'total' => $orderTotal,
        ]);

        return redirect('admin/order')->with('Success', 'Data anda telah berhasil di input !');
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

        $dataproduct = Product::orderBy('id', 'asc')->get();
        $product = Product::find($id);

        $datauser = User::orderBy('id', 'asc')->get();
        $user = User::find($id);

        $datapayment = Payment::orderBy('id', 'asc')->get();
        $payment = Payment::find($id);

        $dataorder = Order::orderBy('created_at', 'desc')->paginate(5);
        $order = Order::find($id);

        $datadetail = OrderDetail::orderBy('created_at', 'desc')->paginate(5);
        $detail = OrderDetail::find($id);
        return view('order.edit', compact('dataproduct', 'product', 'datauser', 'user', 'datapayment', 'payment', 'dataorder', 'order', 'datadetail', 'detail'));
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
        $data = Product::find($id);

        $data->update($request->all());
        return redirect('/admin/order')->with('Success', 'Data anda telah berhasil di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Order::find($id)->delete();
        return redirect('/admin/order');
    }
}
