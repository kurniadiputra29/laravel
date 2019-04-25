@extends('layouts.app')
@section('title', 'pengguna')
@section('style')
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
@endsection
@section('content')
<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Create Pengguna</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Table</a></li>
                                        <li class="breadcrumb-item active"><a href="{{url('pengguna')}}" class="breadcrumb-link">Pengguna</a></li>
                                        <li class="breadcrumb-item active"><a href="{{url('pengguna/create')}}" class="breadcrumb-link">Pengguna Create</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Create Pengguna</h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate method="post" action="{{route('pengguna.store')}}">
                                    	@csrf
                                        <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group row">
                                            	<label for="nama" class="col-3 col-lg-2 col-form-label text-right">Nama</label>
                                            	<div class="col-9 col-lg-9">
                                                	<input id="nama" type="text" required placeholder="Nama" class="form-control" name="nama" value="{{old('nama')}}">
                                                	<div class="invalid-feedback">
                                                        Tolong masukkan Nama anda !
                                                	</div>
                                            	</div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-3 col-lg-2 col-form-label text-right">Email</label>
                                                <div class="col-9 col-lg-9">
                                                    <input id="email" type="email" required="" data-parsley-type="email" placeholder="Email" class="form-control" name="email" value="{{old('email')}}">
                                                    @if (count($errors) > 0)
                                                        <div style="color: red;">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <div class="invalid-feedback">
                                                        Tolong masukkan email anda !
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-3 col-lg-2 col-form-label text-right">Password</label>
                                                <div class="col-9 col-lg-9">
                                                    <input id="password" type="password" required="" placeholder="Password" class="form-control" name="password" value="{{old('password')}}">
                                                    <div class="invalid-feedback">
                                                        Tolong masukkan Password anda !
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="text-align: right; ">
                                            	<div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 ">
                                                	<button class="btn btn-primary" type="submit">Submit</button>
                                                	<a href="{{url('pengguna')}}" class="btn btn-secondary">Cencel</a>
                                            	</div>
                                        	</div>
                                        </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                    </div>
                    </div>
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                
           
                </div>   
@endsection
@section('script')
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
	<script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
@endsection