@extends('layouts.master')
@section('title', 'Data Pendaftar')
@section('judul', 'Data Pendaftar')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pendaftaran Mahasiswa Baru') }}</div>
            <div class="card-body"> 
            <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="pendaftar">Data Pendaftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="orangtua">Data Orangtua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="sekolah">Data Sekolah</a>
            </li>
            </ul>
            
                    <hr />
                <table id="table-data" class="table table-striped table-white">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Gelombang</th>
                            <th>Jurusan</th>
                            <th>Asal Sekolah</th>
                            <th>Alamat Sekolah</th>
                            <th>Nilai Raport</th>
                            <th>Ijazah</th>
                            <th>Prestasi</th>
                            <th>pas_foto</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($pendaftaran as $daftar)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $daftar->gelombang}}</td>
                                <td>{{ $daftar->jurusan}}</td>
                                <td>{{ $daftar->asal_sekolah }}</td>
                                <td>{{ $daftar->alamat_sekolah }}</td>
                                <td>@if ($daftar->nilai_raport !== null)
                                        <img src="{{ asset('storage/nilai_raport/' . $daftar->nilai_raport) }}" width="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td>@if ($daftar->ijazah !== null)
                                        <img src="{{ asset('storage/ijazah/' . $daftar->ijazah) }}" width="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td> @if ($daftar->prestasi !== null)
                                        <img src="{{ asset('storage/prestasi/' . $daftar->prestasi) }}" width="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td> @if ($daftar->pas_foto !== null)
                                        <img src="{{ asset('storage/pas_foto/' . $daftar->pas_foto) }}" width="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop