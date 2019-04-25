@extends('layouts.app2')
@section('title', 'Provinsi')
@section('content')
	<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">INDEX PROVINSI</h3>
              <a href="{{url('admin/provinsi/create')}}" class="btn btn-info pull-right">Create</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="table table-bordered">
                <tbody><tr>
          			<th>Nomor</th>
          			<th>Name Provinsi</th>
      					<th>Create At</th>
      					<th>Action</th>
                </tr>
                @php
				$nomor=1;

				@endphp

				@foreach($provinsi as $row)
					<tr>
						<td>{{$nomor++}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->created_at}}</td>
						<td>
              <a href="{{url('admin/provinsi/'.$row->id.'/edit')}}" class="btn btn-info">Edit</a>
              <form action="{{url('admin/provinsi/'.$row->id.'/delete')}}" method="post" class="btn">
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
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection