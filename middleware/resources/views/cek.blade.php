<!DOCTYPE html>
<html>
<head>
	<title>Cek</title>
</head>
<body>
	<form method="get" action="{{url('/film')}}">
		@csrf
		<label>
			Umur Anda:
			<input type="text" name="umur">
		</label>
		<button type="submit">Submit</button>
	</form>
</body>
</html>