@extends('layouts.app')
@section('title', 'Item')
@section('header')
<h1>
	ITEM
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
	<li class="">Index Item</li>
	<li class="active">Recycle Item</li>
</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">RECYCLE</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>Nomor</th>
							<th>Category</th>
							<th>Name</th>
							<th>Price</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						@php
						$nomor=1;
						@endphp

						@foreach($data1 as $row)
						<tr>
							<td>{{$nomor++}}</td>
							<td>{{$row->category->name}}</td>
							<td>{{$row->name}}</td>
							<td>Rp {{ number_format($row->price, 0, "", ".")}}</td>
							<td>{{($row->status)?'Ada':'Habis'}}</td>
							<td>
								<form action="{{route('item.forceDelete', $row->id)}}" method="post">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger" onclick='javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")'>Hapus</button>
									<a href="{{route('item.index')}}" class="btn btn-info">Back</a>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.col -->
</div>
@endsection