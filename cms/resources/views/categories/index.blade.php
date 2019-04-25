<!DOCTYPE html>
<html>
<head>
	<title>Index Categories</title>
</head>
<body>
	<h3>~~ Categories ~~</h3>
	<table>
		<tr>
			<th>Nama</th>
			<th>Action</th>
		</tr>
		@foreach($categories as $category)
		<tr>
			<td>{{$category->name}}</td>
			<td></td>
		</tr>
		@endforeach
	</table>
</body>
</html>