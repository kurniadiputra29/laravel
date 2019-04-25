@extends('layouts.app2')
@section('title', 'Index')
@section('content')
	<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">INDEX GURU</h3>
              <a href="{{url('admin/guru/create')}}" class="btn btn-info pull-right">Create</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="table table-bordered">
                <tbody><tr>
          <th>Nomor</th>
          <th>Name</th>
          <th>NIP</th>
					<th>Gender</th>
          <th>Phone</th>
					<th>Email</th>
					<th>Create At</th>
					<th>Action</th>
                </tr>
                @php
				$nomor=1;

				@endphp

				@foreach($guru as $row)
					<tr>
						<td>{{$nomor++}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->NIP}}</td>
            <td>{{($row->gender)?'Laki-laki':'Perempuan'}}</td>
						<td>{{$row->phone}}</td>
						<td>{{$row->email}}</td>
						<td>{{$row->created_at}}</td>
						<td>
                    		<a href="{{url('admin/guru/'.$row->id.'/edit')}}" class="btn btn-info">Edit</a>
                    		<form action="{{url('admin/guru/'.$row->id.'/delete')}}" method="post" class="btn">
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
                <li>{{$guru->links()}}</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection