@extends('layouts.app')
@section('title', 'santri')
@section('content')
<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Orangtua</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Table</a></li>
                                        <li class="breadcrumb-item active"><a href="{{url('orangtua')}}" class="breadcrumb-link">Orangtua</a></li>
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
                                <h5 class="card-header">Data Orangtua</h5>

                                <div class="card-body">
                                    <a href="{{url('/orangtua/create')}}" class="btn btn-space btn-primary col-1">Create</a>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Id Santri</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Pekerjaan</th>
                                                <th scope="col">Pendidikan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $nomor = 1;
                                            @endphp
                                        	@foreach($data as $orangtua)
                                            <tr>
                                                <th>{{$nomor++}}</th>
                                                <td>{{$orangtua->id_santri}}</td>
                                                <td>{{$orangtua->nik}}</td>
                                                <td>{{$orangtua->nama}}</td>
                                                <td>{{$orangtua->gender}}</td>
                                                <td>{{$orangtua->pekerjaan}}</td>
                                                <td>{{$orangtua->pendidikan}}</td>
                                                <td>
                                                    <form method="post" action="{{route('orangtua.destroy', $orangtua->id)}}">
                                                        <a href="{{route('orangtua.edit', $orangtua->id)}}" class="btn btn-space btn-primary ">Edit</a>
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-space btn-secondary" onclick='javascript: return confirm("Apakah anda yakin ingin menghapus data ini ?")'>Hapus</button>
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