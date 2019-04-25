@extends('layouts.app2')
@section('title', 'Provinsi')
@section('content')
	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CREATE PROVINSI</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(count($errors)>0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $eror)
                  <li>{{$eror}}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form class="form-horizontal" action="{{url('admin/provinsi')}}" method="post">
            	@csrf
              <div class="box-body">
              	<div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('admin/provinsi')}}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
      	</div>
@endsection