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
                <a class="nav-link" aria-current="page" href="pendaftar">Data Pendaftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="orangtua">Data Orangtua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sekolah">Data Sekolah</a>
            </li>
            </ul>
            
                    <hr />
                <table id="table-data" class="table table-striped table-white">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NO KK</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Gaji</th>
                            <th>tanggungan</th>
                            <th>Slip Gaji</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($pendaftaran as $daftar)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $daftar->no_kk}}</td>
                                <td>{{ $daftar->nama_ayah}}</td>
                                <td>{{ $daftar->nama_ibu }}</td>
                                <td>{{ $daftar->pekerjaan_ayah }}</td>
                                <td>{{ $daftar->pekerjaan_ibu }}</td>
                                <td>{{ $daftar->gaji }}</td>
                                <td>{{ $daftar->tanggungan }}</td>
                                <td> @if ($daftar->slip_gaji !== null)
                                        <img src="{{ asset('storage/slip_gaji/' . $daftar->slip_gaji) }}" width="100px" />
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