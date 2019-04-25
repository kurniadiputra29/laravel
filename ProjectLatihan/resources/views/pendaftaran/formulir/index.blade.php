<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form method="post" action="{{ url('/proses') }}">

		@csrf <!--untuk membuat token-->

		<label>Nama:</label>
		<input type="text" name="nama">

		<br>

		<label>No Hp:</label>
		<input type="number" name="hp">

		<br>

		<button type="submit">Submit</button>
	</form>

	@if(isset($nama) || isset($hp))
		{{ $nama }}
		<br>
		{{ $hp }}
	@endif
</body>
</html>