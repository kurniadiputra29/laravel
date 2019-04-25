<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>

	<a href="{{route('auth.logout')}}">Logout</a>
	<h3>~|| User List ||~</h3>

	{{auth()->check()}}
	<br>
	{{auth()->user()->email}}
	<br>
	{{auth()->user()->name}}
	<br>

	<a href="{{route('users.create')}}">Create</a>
	<table>
		<tr>
			<th>Nama</th>
			<th>Email</th>
			<th>Terdaftar Pada</th>	
			<th>Jumlah Articles</th>
			<th>Action</th>
		</tr>

		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->created_at}}</td>
			<td>{{$user->articles()->count()}}</td>
			<td>
				
				<form method="post" action="{{route('users.destroy', $user->id)}}">
					<a href="{{route('users.edit', $user->id)}}">Edit</a>
					@csrf
					@method('DELETE')
					<button type="submit">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>