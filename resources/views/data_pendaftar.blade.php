@extends('layouts.master')
@section('title', 'Data Pendaftar')
@section('judul', 'Data Pendaftar')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pendaftaran Mahasiswa Baru') }}</div>
            <div class="card-body">
            <a href="pendaftaran/tambah_pendaftar" class="btn btn-primary">TAMBAH DATA</a>
                    <hr />
            <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Data Pendaftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Data Orangtua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Data Sekolah</a>
            </li>
            </ul>
            
                    <hr />
                <table id="table-data" class="table table-striped table-white">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th>NO HP</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($pendaftaran as $daftar)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $daftar->NISN}}</td>
                                <td>{{ $daftar->nama}}</td>
                                <td>{{ $daftar->jenis_kelamin }}</td>
                                <td>{{ $daftar->agama }}</td>
                                <td>{{ $daftar->alamat }}</td>
                                <td>{{ $daftar->jurusan }}</td>
                                <td>{{ $daftar->email }}</td>
                                <td>{{ $daftar->no_hp }}</td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-buku" class="btn btn-success"
                                            data-toggle="modal" data-target="#editBukuModal"
                                            data-id="{{ $daftar->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="deleteConfirmation('{{ $daftar->nama_siswa }}' )">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop