<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
</head>
<body>
<div>
	<a href="{{route('articles.create')}}">Create</a>
</div>
<div>
	<a href="{{route('articles.index')}}">Home</a>
</div>
<div>
	<a href="{{route('articles.trash')}}">Trash</a>
</div>

<div>
	<h1>Data Articles yang terlihat HOME</h1>
	<table border="1px">
		<tr>
			<th>User</th>
			<th>Title</th>
			<th>Content</th>
			<th>Action</th>
		</tr>
		@foreach($articles as $article)
		<tr>
			<td>{{$article->user->name}}</td>
			<td>{{$article->title}}</td>
			<td>{{$article->content}}</td>
			<td>
				<form method="post" action="{{route('articles.destroy',$article->id)}}">
					@csrf @method('DELETE')
					<button>Hapus</button>
				</form>
				<form method="post" action="{{route('articles.forceDelete',$article->id)}}">
					@csrf @method('DELETE')
					<button>Hapus Semua</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
</body>
</html>