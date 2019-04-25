<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>
	<h3>Edit User</h3>
	<form method="post" action="{{route('users.update', $user->id)}}">
		@csrf
		@method('PUT')

		<label>Nama
			<input type="text" name="name" value="{{$user->name}}">
		</label>
		<br>
		<label> Email
			<input type="email" name="email" value="{{$user->email}}">
		</label>
		<br>
		<label> Password
			<input type="password" name="password" value="{{$user->password}}">
		</label>
		<br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>