@extends('layout.app')

@section('title', 'kamar')

@section('content')
<p style="text-align: center;"> Aplikasi penghitung luas kamar mas {{ $nama }} </p>
<form method="post" action="{{ url('/Luas-Kamar')}}">
	@csrf 
	<div style="text-align: center;">
	<label >Panjang kamar (cm)</label>
	</div>
	<div style="text-align: center;">
	<input type="number" name="panjang">
	</div>
	<div style="text-align: center; margin-top: 20px;">
	<label>Lebar Kamar</label>
	</div>
	<div style="text-align: center;">
	<input type="number" name="lebar">
	</div>
	<div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
	<button type="submit">Submit</button>
	</div>
	@if(isset($panjang) || isset($lebar))
		{{ $panjang }}
		<br>
		{{ $lebar }}
	@endif
</form>
@endsection