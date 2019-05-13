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

    	$orders = Order::orderBy('created_at', 'desc')->paginate(5);
    	return view('order.index', compact('orders', 'subtotals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$products = Product::where('status', '1')->get(); // untuk mengmunculkan produk yang berstatus ada.
    	$payments = Payment::all();
    	return view('order.create', compact('products', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
    	$request->merge([
    		'user_id' => auth()->user()->id,
    	]);

    	$dataOrder          = $request->only('table_number', 'payment_id', 'user_id','diskon', 'total', 'email');
    	$order              = Order::create($dataOrder);

        
    	$dataDetail 				= $request->only('product_name','product_price', 'quantity', 'subtotal', 'note');
    	$countDetail				= count($dataDetail['quantity']);

    	for ($i=0; $i < $countDetail; $i++) { 
    		$detail 							= new OrderDetail();
    		$detail->order_id			= $order->id;
            $detail->product_name          = $dataDetail['product_name'][$i];
    		$detail->product_price	     = $dataDetail['product_price'][$i];
    		$detail->quantity			= $dataDetail['quantity'][$i];
    		$detail->subtotal			= $dataDetail['subtotal'][$i];
    		$detail->note 				= $dataDetail['note'][$i];
    		$detail->save();
    	}

    	return redirect('/admin/order');
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
        $orders     = Order::find($id);
    	$details		= OrderDetail::all();
    	$products = Product::where('status', '1')->get(); // untuk mengmunculkan produk yang berstatus ada.
    	$payments = Payment::all();
    	return view('order.edit', compact('orders', 'products', 'payments', 'details'));
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
    	$request->merge([
    		'user_id' => auth()->user()->id,
    	]);

    	$dataOrder          = $request->only('table_number', 'payment_id', 'user_id','diskon' ,'total', 'email');
    	$order              = Order::find($id)->update($dataOrder);

    	$dataDetail 				= $request->only('product_name', 'product_price', 'quantity', 'subtotal', 'note');
    	$countDetail				= count($dataDetail['quantity']);

    	OrderDetail::where('order_id', $id)->delete();

    	for ($i=0; $i < $countDetail; $i++) { 
    		$detail 							= new OrderDetail();
    		$detail->order_id			= $id;
            $detail->product_name         = $dataDetail['product_name'][$i];
    		$detail->product_price        = $dataDetail['product_price'][$i];
    		$detail->quantity			= $dataDetail['quantity'][$i];
    		$detail->subtotal			= $dataDetail['subtotal'][$i];
    		$detail->note 				= $dataDetail['note'][$i];
    		$detail->save();
    	}

    	return redirect('/admin/order');
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
    public function print($id)
    {
        $orders = Order::find($id);
        return view('order.print', compact('orders'));
    }
}
