@extends('layouts.app')
@section('title', 'santri')
@section('content')
<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Santri</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Table</a></li>
                                        <li class="breadcrumb-item active"><a href="{{url('santri')}}" class="breadcrumb-link">Santri</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Data Santri</h5>

                                <div class="card-body">
                                    <a href="{{url('/santri/create')}}" class="btn btn-space btn-primary col-1">Create</a>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">NISN</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tempat Tanggal Lahir</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $nomor = 1;
                                            @endphp
                                        	@foreach($data as $santri)
                                            <tr>
                                                <th>{{$nomor++}}</th>
                                                <td>{{$santri->nisn}}</td>
                                                <td>{{$santri->nama}}</td>
                                                <td>{{$santri->tempat_lahir}}, {{$santri->tanggal_lahir}}</td>
                                                <td>{{$santri->alamat}}</td>
                                                <td>
                                                	<form method="post" action="{{route('santri.destroy',$santri->id)}}">
                                                		@csrf
                                                		@method('delete')
                                                		<a href="{{route('santri.edit', $santri->id)}}" class="btn btn-space btn-primary">Edit</a>
                                                		<button type="submit" class="btn btn-space btn-secondary" onclick='javascript: return confirm("Apakah anda yakin ingin menghapus data ini !")'>Hapus</button>
                                                	</form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
@endsection