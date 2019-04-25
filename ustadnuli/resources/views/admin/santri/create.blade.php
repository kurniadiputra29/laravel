@extends('layouts.app2')

@section('title', 'Page Title')

@section('content')
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CREATE USER</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal" action="{{url('admin/santri')}}" method="post">
            	@csrf
              <div class="box-body">
              	<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="{{ old('nama') }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="gender" class="col-sm-2 control-label">Gender</label>
                  <div class="col-sm-10 radio">
                  	<label>
                      <input type="radio" name="gender" id="gender" value="1">Laki-Laki
                    </label>
                    <label>
                      <input type="radio" name="gender" id="gender" value="0" >Perempuan
                  	</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Provinsi" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-10">
                    <input type="number" name="provinsi_id" class="form-control" id="Provinsi" placeholder="Provinsi" value="{{ old('provinsi_id')}}">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('admin/santri')}}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
      	</div>
@endsection

