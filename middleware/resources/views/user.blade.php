<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>
	<h3>Daftar User</h3>
	<form method="post" action="{{route('auth.logout')}}">
		@csrf
		<button type="submit">Logout</button>
	</form>
	<table border="2px">
		<tr>
			<th>Nama</th>
			<th>Email</th>
			<th>Terdaftar Pada</th>
			<th>Action</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->created_at}}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>