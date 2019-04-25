<!DOCTYPE html>
<html>
<head>
	<title>Create Articles</title>
</head>
<body>
<div>
	<form method="post" action="{{route('articles.store')}}">
		@csrf
		<p>
			Title
			<input type="text" name="title" placeholder="Title">
		</p>
		<p>
			Content
			<textarea name="content" placeholder="Content"></textarea>
		</p>
		<p>
			<button type="submit">Submit</button>
			<a href="{{route('articles.index')}}">Back</a>
		</p>
	</form>
</div>
</body>
</html>