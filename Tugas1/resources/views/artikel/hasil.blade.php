@extends('layout.app')

@section('title', 'Luas Kamar')

@section('content')
<div style="text-align: center;">
<button><a href="{{route('formulir', 'nama')}}"> Back to from</a></button>
</div>
<p style="text-align: center; margin-top: 20px;">Luas Kamar Adalah:</p>
<p style="text-align: center; margin-top: 20px;">{{$luas}} cm<sup>2</sup></p> 
<div style="width:{{$panjang}}px; height: {{$lebar}}px; border: 2px solid black; justify-content: center; margin: auto; margin-bottom: 20px;">
	<p style="float: right; font-size: 12px;">{{$panjang}}cm</p>
	<p style="float: left; margin-top:{{$l}}px; font-size: 12px;">{{$lebar}}cm</p>
	<p style="text-align: center; margin-top:{{$l}}px; margin-left: {{$pn}}px; font-size: 12px;" >{{$luas}}cm<sup>2</sup></p>	
</div>
@endsection