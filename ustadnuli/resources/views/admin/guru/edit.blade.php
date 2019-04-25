@extends('layouts.app2')

@section('title', 'Page Title')

@section('content')
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">EDIT GURU</h3>
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
            <form class="form-horizontal" action="{{url('admin/guru')}}" method="post">
            	@csrf
              @method('PUT')

              <div class="box-body">
              	<div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="{{$guru->id}}">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$guru->name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">NIP</label>
                  <div class="col-sm-10">
                    <input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" value="{{$guru->NIP}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="gender" class="col-sm-2 control-label">Gender</label>
                  <div class="col-sm-10 radio">
                    <label>
                      <input type="radio" name="gender" id="gender" value="1" {{($guru->gender)?'checked':''}}>Laki-Laki
                    </label>
                    <label>
                      <input type="radio" name="gender" id="gender" value="0" {{($guru->gender)?'':'checked'}} >Perempuan
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{$guru->phone}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$guru->email}}">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('admin/guru')}}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
      	</div>
@endsection

