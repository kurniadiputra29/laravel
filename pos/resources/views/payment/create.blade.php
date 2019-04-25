@extends('layouts.app')
@section('title', 'payment')
@section('header')
	<h1>
        PAYMENT
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('payment.index')}}"> Payment</a></li>
        <li><a href="{{route('payment.index')}}"> Index Payment</a></li>
        <li class="active" >Create Payment</li>
    </ol>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
       <h3 class="box-title">CREATE PAYMENT</h3>
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
    <form class="form-horizontal" action="{{route('payment.store')}}" method="post">
        @csrf
		<div class="box-body">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
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