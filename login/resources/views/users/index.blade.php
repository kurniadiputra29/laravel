@extends('layouts.app2')
@section('title', 'Users')
@section('content')
		<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                	<th>No.</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
				@php
					$nomor = 1;
				@endphp
                @foreach($users as $user)

				<tr>
					<td>{{$nomor++}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
				</tr>
				@endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            	<form method="post" action="{{route('auth.logout')}}" class="pagination pagination-sm no-margin">
					@csrf
					<button type="submit" class="btn btn-block btn-defauld">Logout</button>
				</form>
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
        </div>

@endsection