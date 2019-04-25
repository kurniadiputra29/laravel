<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
</head>
<body>
	<h1>Orders List</h1>
	<a href="{{route('orders.create')}}">Create Order</a>
	<table>
		<thead>
			<tr>
				<th>Table Number</th>
				<th>Payment</th>
				<th>Total</th>
				<th>Created By</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{$order->table_number}}</td>
				<td>{{$order->payment->name}}</td>
				<td>{{$order->total}}</td>
				<td>{{$order->user->name}}</td>
				<td>
					<form method="post" action="{{route('orders.destroy', $order->id)}}">
						<a href="{{route('orders.show', $order->id)}}">Detail</a>
						<a href="{{route('orders.edit', $order->id)}}">Edit</a>
						@csrf
						@method('DELETE')
						<button>Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>