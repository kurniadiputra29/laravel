<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">INDEX ORDER</h3>
				<div class="pull-right">
					<div class="box-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Nomor</th>
									<th>Table Number</th>
									<th>Total</th>
									<th>Order Date</th>
									<th>Kasir</th>
								</tr>
								@php
								$nomor=1;
								@endphp

								@foreach($orders as $order)
								<tr>
									<td>{{$nomor++}}</td>
									<td>{{$order->table_number}}</td>
									<td>Rp {{ number_format($order->total, 0, " ", ".") }}</td>
									<td>{{$order->created_at}}</td>
									<td>{{$order->user->name}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
