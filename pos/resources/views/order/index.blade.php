@extends('layouts.app')
@section('title', 'Order')
@section('header')
<h1>
	ORDER
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
	<li class="active">Index Order</li>
</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">INDEX ORDER</h3>
				<a href="{{route('order.create')}}" class="btn btn-info pull-right">Create</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>Nomor</th>
							<th>Table Number/Nomor Meja</th>
							<th>Total</th>
							<th>Pembayaran</th>
							<th>Kasir</th>
							<th>Action</th>
						</tr>
						@php
						$nomor=1;
						@endphp

						@foreach($orders as $order)
						<tr>
							<td>{{$nomor++}}</td>
							<td>{{$order->table_number}}</td>
							<td>Rp {{ number_format($order->total, 0, " ", ".") }}</td>
							<td>{{$order->payment->name}}</td>
							<td>{{$order->user->name}}</td>
							<td>
								<form action="{{route('order.destroy', $order->id)}}" method="post">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$order->id}}">Detail</button>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger" onclick='javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")'>Hapus</button>
								</form>
								<div class="modal fade" id="{{$order->id}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Detail</h4>
												</div>
												<div class="modal-body">

													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">INDEX ORDER</h3>
														</div>
														<!-- /.box-header -->
														<div class="box-body">
															<table class="table table-bordered">
																<tbody>
																	<tr>
																		<th>Nomor</th>
																		<th>Order</th>
																		<th>Product</th>
																		<th>Quantity</th>
																		<th>Subtotal</th>
																		<th>Note</th>
																	</tr>
																	@php
																	$nomor=1;
																	@endphp
																	@foreach($order->orderDetail as $row)
																	<tr>
																		<td>{{$nomor++}}</td>
																		<td>{{$row->order->id}}</td>
																		<td>{{$row->product->name}}</td>
																		<td>{{$row->quantity}}</td>
																		<td>Rp {{ number_format($row->subtotal, 0," ",".")}}</td>
																		<td>{{$row->note}}</td>
																	</tr>
																	@endforeach
																	@if (session('Success'))
																	<div class="alert alert-success">
																		{{ session('Success') }}
																	</div>
																	@endif
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Save changes</button>
												</div>
											</div>
										</div>
									</div>
								</section>
							</td>
						</tr>
						@endforeach
						@if (session('Success'))
						<div class="alert alert-success">
							{{ session('Success') }}
						</div>
						@endif
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
			<div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li>{{$orders->links()}}</li>
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection
