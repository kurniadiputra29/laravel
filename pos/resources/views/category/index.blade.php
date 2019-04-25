@extends('layouts.app')
@section('title', 'category')
@section('header')
	<h1>
        Category
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
        <li class="active">Index Category</li>
    </ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">INDEX CATEGORY</h3>
              <a href="{{route('category.create')}}" class="btn btn-info pull-right">Create</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="table table-bordered">
                <tbody>
                <tr>
          			<th>Nomor</th>
          			<th>Name</th>
					<th>Action</th>
                </tr>
                @php
				$nomor=1;
				@endphp

				@foreach($data as $row)
				<tr>
					<td>{{$nomor++}}</td>
            		<td>{{$row->name}}</td>
					<td>
                    	<form action="{{route('category.destroy', $row->id)}}" method="post">
                      <a href="{{route('category.edit', $row->id)}}" class="btn btn-info">Edit</a>
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