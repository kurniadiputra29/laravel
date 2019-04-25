<!DOCTYPE html>
<html>
<head>
	<title>Detail Orderan</title>
</head>
<body>
<h1>Detail Order</h1>
<p>Table Number:{{$order->table_number}}</p>
<p>Payment:{{$order->payment->name}}</p>
<p>Created By:{{$order->user->name}}</p>

<hr>

<h3>Order Details</h3>
@foreach($order->orderDetail as $detail)
	<p>
		{{$detail->product->name}}
		{{$detail->quantity}} pcs :
		{{$detail->subtotal}} 
	</p>
	<p>
		note: {{$detail->note}} 
	</p>
@endforeach

<h3>Total:{{$order->total}}</h3>
</body>
</html>