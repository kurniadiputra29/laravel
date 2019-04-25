@extends('layouts.app')
@section('title', 'Item')
@section('header')
<h1>
	ITEM
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
	<li class="active">Index Item</li>
</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">INDEX ITEM</h3>
				<a href="{{route('item.create')}}" class="btn btn-info pull-right">Create</a>
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

						@foreach($data as $row)
						<tr>
							<td>{{$nomor++}}</td>
							<td>{{$row->category->name}}</td>
							<td>{{$row->name}}</td>
							<td>Rp {{ number_format($row->price, 0, " ", ".")}}</td>
							<td>{{($row->status)?'Ada':'Habis'}}</td>
							<td>
								<form action="{{route('item.destroy', $row->id)}}" method="post">
									<a href="{{route('item.edit', $row->id)}}" class="btn btn-info">Edit</a>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger" onclick='javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")'>Hapus</button>
									<a href="{{route('item.trash')}}" class="btn btn-info"><i class="fa fa-trash-o"></i> Trash</a>
								</form>
							</td>
						</tr>
						@endforeach
						@if (session('Success'))
						<div class="alert alert-success">
							{{ session('Success') }}
						</div>
						@endif
					</tbody></table>
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					<ul class="pagination pagination-sm no-margin pull-right">
						<li>{{$data->links()}}</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /.col -->
	</div>
	@endsection