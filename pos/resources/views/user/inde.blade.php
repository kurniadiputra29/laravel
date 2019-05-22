@extends('layouts.app')
@section('title', 'User')
@section('header')
<h1>
	USER
</h1>
<ol class="breadcrumb">
	<li>User</li>
	<li class="active">Index User</li>
</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">INDEX USER</h3>
				<a href="{{route('user.create')}}" class="btn btn-info pull-right">Create</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>Nomor</th>
							<th>Name</th>
							<th>Email</th>
							<th>Foto</th>
							<th>Action</th>
						</tr>
						@php
						$nomor=1;
						@endphp

						@foreach($data as $row)
						<tr>
							<td>{{$nomor++}}</td>
							<td>{{$row->name}}</td>
							<td>{{$row->email}}</td>
							<td><img width="150px" src="{{Storage::url($row->foto) }}"></td>
							<td>
								<form action="{{route('user.destroy', $row->id)}}" method="post">
									<a href="{{route('user.edit', $row->id)}}" class="btn btn-info">Edit</a>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger" onclick='javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")'>Hapus</button>
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