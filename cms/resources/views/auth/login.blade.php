<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h3>Login Form</h3>
	<form method="post" action="{{route('auth.login-form')}}">
		@csrf
		
		<label>
			Email:
			<input type="email" name="email">
		</label>
		<br>
		<label>
			Password:
			<input type="password" name="password">
		</label>
		<br>
		<button type="submit">Login</button>
	</form>
</body>
</html>