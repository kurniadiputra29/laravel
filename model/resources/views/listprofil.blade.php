<!DOCTYPE html>
<html>
<head>
	<title>Profil Accessor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

	<div class="container text-center">
		<div class="jumbotron">LIST Profil</div>
		<a href="{{route('profil.create')}}">Tambah</a>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nama Lengkap</th>
		      <th scope="col">Alamat</th>
		      <th scope="col">Img</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  @php
		  	$nomor = 1;
		  @endphp
		  <tbody>
		  	@foreach($avas as $ava)
		    <tr>
		      <th scope="row">{{$nomor++}}</th>
		      <td>{{$ava->nama}}</td>
		      <td>{{$ava->alamat}}</td>
		      <td><img class="col-4" src="{{Storage::url($ava->file)}}"></td>
		      <td>
		      	<button type="button" class="btn btn-primary {{$ava->depan}}" data-toggle="modal" data-target="#{{$ava->depan}}">
				  Launch demo modal
				</button>
				<!-- Modal -->
				<div class="modal fade" id="{{$ava->depan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Ava</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h1><img src="{{ Avatar::create($ava->modal)->toBase64() }}" /></h1>
				        <h1><img class="col" src="{{Storage::url($ava->file)}}"></h1>
				      </div>
				    </div>
				  </div>
				</div>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<!-- Button trigger modal -->
		
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
</body>
</html>