<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
</head>
<body>
	<h3>Create User</h3>
	<form method="post" action="{{route('articles.store')}}">
		@csrf
		{{-- <label>User</label>
		<select name="name" class="form-control">
			@foreach($users as $user)
			  <option value="{{$user->id}}">{{$user->name}}</option>
			@endforeach
		</select> --}}
		<label>
			User
			<input type="number" name="name">
		</label>
		<br>
		<br>
		<label> Title
			<input type="text" name="title">
		</label>
		<br>
		<br>
		<label> Content
			<textarea name="content"></textarea>
		</label>
		<br>
		<br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>