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
				<div class="pull-right">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#a">Download</button>
					<div class="modal fade" id="a">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Detail</h4>
									</div>
									<div class="modal-body">
										<form class="form-horizontal" action="{{route('laporan.download')}}" method="post">
											<div class="box">
												<div class="box-header with-border">
													<h3 class="box-title">INDEX ORDER</h3>
												</div>
												<!-- /.box-header -->

												@csrf
												<div class="box-body">
													<div class="form-group">
														<label class="col-sm-3 control-label">Tahun</label>
														<div class="col-sm-7">
															<select class="form-control select2" name="year" required>
																@foreach(range(2018, date('Y')) as $row)
																<option value="{{$row}}" {{($row==date('Y')) ? 'selected': ''}}>{{ $row }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Bulan</label>
														<div class="col-sm-7">
															<select class="select2 form-control" name="month" required>
																@for($i=1; $i <= 12; $i++)
																<option value="{{$i}}" {{($i==date('n')) ? 'selected': ''}}>{{ date('F', strtotime(date('Y').'-'.$i.'-01')) }}</option>
																@endfor
															</select>
															{{-- <input class="form-control" name="letter_entry" id="reservation" required> --}}
														</div>
													</div>
													<div class="form-group">
															<label class="col-sm-3 control-label">Kasir</label>
															<div class="col-sm-7">
																<select class="select2 form-control" name="kasir" required>
																	@foreach($users as $user)
																	<option value="{{$user->id}}">{{$user->name}}</option>
																	@endforeach
																	<option value="all">Semua Kasir</option>
																</select>
																{{-- <input class="form-control" name="letter_entry" id="reservation" required> --}}
															</div>
														</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Type</label>
														<div class="col-sm-7">
															<div class="radio">
																<label>
																	<input type="radio" name="document_type" id="document_type" value="1" checked="">
																	PDF
																</label>
															</div>
															<div class="radio">
																<label>
																	<input type="radio" name="document_type" id="document_type" value="2">
																	Excel
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cencel</button>
												<button type="submit" class="btn btn-primary pull-right">Download</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pull-right" style="margin-right: 20px;">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#b">Filter</button>
						<div class="modal fade" id="b">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Detail</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" action="{{route('laporan.filter')}}" method="post">
												<div class="box">
													<div class="box-header with-border">
														<h3 class="box-title">INDEX ORDER</h3>
													</div>
													<!-- /.box-header -->
													@csrf
													<div class="box-body">
														<div class="form-group">
															<label class="col-sm-3 control-label">Tahun</label>
															<div class="col-sm-7">
																<select class="form-control select2" name="year" required>
																	@foreach(range(2018, date('Y')) as $row)
																	<option value="{{$row}}" {{($row==date('Y')) ? 'selected': ''}}>{{ $row }}</option>
																	@endforeach
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-3 control-label">Bulan</label>
															<div class="col-sm-7">
																<select class="select2 form-control" name="month" required>
																	@for($i=1; $i <= 12; $i++)
																	<option value="{{$i}}" {{($i==date('n')) ? 'selected': ''}}>{{ date('F', strtotime(date('Y').'-'.$i.'-01')) }}</option>
																	@endfor
																</select>
																{{-- <input class="form-control" name="letter_entry" id="reservation" required> --}}
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-3 control-label">Kasir</label>
															<div class="col-sm-7">
																<select class="select2 form-control" name="kasir" required>
																	@foreach($users as $user)
																	<option value="{{$user->id}}">{{$user->name}}</option>
																	@endforeach
																	<option value="all">Semua Kasir</option>
																</select>
																{{-- <input class="form-control" name="letter_entry" id="reservation" required> --}}
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cencel</button>
												<button type="submit" class="btn btn-primary pull-right">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Nomor</th>
									<th>Table Number</th>
									<th>Total</th>
									<th>Order Date</th>
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
									<td>{{date('d-M-Y', strtotime($order->created_at))}} {{date('H:i', strtotime($order->created_at))}} WIB</td>
									<td>{{$order->user->name}}</td>
									<td>
										<a href="{{route('order.index')}}" class="btn btn-primary">Detail</a>
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
