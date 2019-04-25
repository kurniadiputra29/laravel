<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
</head>
<body>
	<h3>~|| Articles List ||~</h3>
		<a href="{{route('articles.create')}}">Create</a>
	<table>
		<tr>
			<th>Author</th>
			<th>Category</th>
			<th>Judul</th>
			<th>Terdaftar Pada</th>	
			{{--<th>Action</th>--}}
		</tr>

		@foreach($articles as $article)
		<tr>
			<td>{{$article->user->name}}</td>{{--untuk ralavel tidak perlu menggunakan join, tetapi cukup dengan yang di atas--}}
			<td>{{$article->user->name}}</td>
			<td>{{$article->title}}</td>
			<td>{{$article->created_at}}</td>{{--
			<td>
				
				<form method="post" action="{{route('users.destroy', $user->id)}}">
					<a href="{{route('users.edit', $user->id)}}">Edit</a>
					@csrf
					@method('DELETE')
					<button type="submit">Delete</button>
				</form>
			</td>--}}
		</tr>
		@endforeach
	</table>
</body>
</html>