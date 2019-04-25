@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>My name is {{$nama}}</p>
    <p>Alamat : {{$alamat}}</p>
    <p>Kelamin : 
    	@if ($gender == 1)
    		Laki laki
    	@else 
    		Perempuan
    	@endif
    </p>
    <p>
    	@include('layouts.part.sidebar')
    </p>
{{-- This comment will not be present in the rendered HTML --}}
@endsection