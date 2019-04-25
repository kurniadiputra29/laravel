<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
</head>
<body>
	<h3>Create User</h3>

	<form method="post" action="{{route('users.store')}}">
		@csrf
		<label>Nama
			<input type="text" name="name">
		</label>

		@if($errors->has('name'))
			<span style="color: red;">{{$errors->first('name')}}</span>
		@endif

		<br>
		<label> Email
			<input type="email" name="email">
		</label>

		@if($errors->has('email'))
			<span style="color: red;">{{$errors->first('email')}}</span>
		@endif

		<br>
		<label> Password
			<input type="password" name="password">
		</label>

		@if($errors->has('password'))
			<span style="color: red;">{{$errors->first('password')}}</span>
		@endif

		<br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>