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
							<th>Table Number</th>
							<th>Diskon</th>
							<th>Total</th>
							<th>Pembayaran</th>
							<th>Kasir</th>
							<th>Action</th>
						</tr>
						@php
						$no = 1;
						@endphp

						@foreach($orders as $order)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$order->table_number}}</td>
							<td>Rp {{number_format($order->diskon, 0, " ", ".")}}</td>
							<td>Rp {{ number_format($order->total, 0, " ", ".") }}</td>
							<td>{{$order->payment->name}}</td>
							<td>{{$order->user->name}}</td>
							<td>
								<form action="{{route('order.destroy', $order->id)}}" method="post">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$order->id}}">Detail</button>
									@csrf
									@method('DELETE')
									<a href="{{route('order.edit', $order->id)}}" class="btn btn-primary">Edit</a>
									<button type="submit" class="btn btn-danger" onclick='javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")'>Hapus</button>
								</form>
								<div class="modal fade" id="{{$order->id}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<i class="fa fa-cart-plus"></i> Order Detail
													</h4>
												</div>
												<div class="modal-body">
													<!-- info row -->
													<div class="row invoice-info">
														<div class="col-sm-4 invoice-col">
															From
															<address>
																<strong>Toko Adi Putro</strong><br>
																jl. Kali Urang, KM 60<br>
																Barat Pom Bensin, Pokoh<br>
																Phone: (804) 123-5432<br>
																Email: info@adiputro.com
															</address>
														</div>
														<div class="col-sm-3 invoice-col" style="text-align: center;">
															Table Number<br>
															<strong>{{$order->table_number}}</strong>
														</div>
														<div class="col-xs-2 invoice-col" style="text-align: center;">
															Costomers Service<br>
															<strong>{{$order->user->name}}</strong>
														</div>
														<div class="col-xs-3 invoice-col" style="text-align: center;">
															Created at<br>
															<strong>{{date('d-M-Y', strtotime($order->created_at))}}</strong><br>
															<strong>{{date('H:i', strtotime($order->created_at))}} WIB</strong>
														</div>
														<!-- /.col -->
													</div>
													<!-- /.row -->

													<!-- Table row -->
													<div class="row">
														<div class="col-xs-12 table-responsive">
															<table class="table table-striped">
																<thead>
																	<tr>
																		<th>Nomor</th>
																		<th>Order</th>
																		<th>Product Name</th>
																		<th>Product Price</th>
																		<th>Quantity</th>
																		<th>Subtotal</th>
																		<th>Note</th>
																	</tr>
																</thead>
																<tbody>
																	@php
																	$nomor=1;
																	@endphp
																	@foreach($order->orderDetail as $row)
																	<tr>
																		<td>{{$nomor++}}</td>
																		<td>{{$row->order->id}}</td>
																		<td>{{$row->product_name}}</td>
																		<td>Rp {{ number_format($row->product_price, 0,"", ".")}}</td>
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
														<!-- /.col -->
													</div>
													<!-- /.row -->

													<div class="row">
														<!-- accepted payments column -->
														<div class="col-xs-12">
															<p class="lead">Payment Methods: <b>{{$order->payment->name}}</b></p>
														</div>
														<!-- /.col -->
														<div class="col-xs-12">
															<div class="table-responsive">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width:50%">Subtotal:</th>
																			<td>Rp {{ number_format($order->total + $order->diskon, 0, " ", ".")}}</td>
																		</tr>
																		<tr>
																			<th>Diskon:</th>
																			<td>Rp {{ number_format($order->diskon, 0, " ", ".") }}</td>
																		</tr>
																		<tr>
																			<th>PPN:</th>
																			<td>Rp {{ number_format(0) }}</td>
																		</tr>
																		<tr>
																			<th>Total:</th>
																			<td>Rp {{ number_format($order->total, 0, " ", ".") }}</td>
																		</tr>
																		<tr>
																		</tbody>
																	</table>
																</div>
															</div>
															<div class="col-xs-12">
																<p class="lead">Email: {{$order->email}}</p>
															</div>
														</div>
														<div class="row no-print">
															<div class="col-xs-12">
																<a href="{{route('order.print', $order->id)}}" target="_blank" class="btn btn-primary pull-left"><i class="fa fa-print"></i> Print</a>
																<form action="{{route('order.sendEmail', $order->id)}}" method="POST">
																	{{ csrf_field() }}
																	<input type="hidden" class="form-control text-center" value="{{$order->id}}" name="id">
																	<input type="hidden" class="form-control text-center" value="{{$order->email}}" name="email">
																	<button type="submit" class="btn btn-primary pull-left" style="margin-left: 10px;">Send Email</button>
																</form>
																<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
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
