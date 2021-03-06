@extends('layouts.app')
@section('title', 'payment')
@section('header')
	<h1>
        PAYMENT
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Payment</a></li>
        <li><a href="{{route('payment.index')}}">Index Payment</a></li>
        <li class="active" >Edit Payment</li>
    </ol>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
       <h3 class="box-title">EDIT PAYMENT</h3>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-horizontal" action="{{route('payment.update', $data->id)}}" method="post">
        @csrf
        @method('PUT')
		<div class="box-body">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$data->name}}">
				</div>
			</div>
		</div>
        <div class="box-footer">
            <a href="{{route('payment.index')}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
    </form>
</div>
@endsection