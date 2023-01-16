@extends('layouts.master')
@section('title', 'Data Pendaftar')
@section('judul', 'Data Pendaftar')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pendaftaran Mahasiswa Baru') }}</div>
            <div class="card-body">
            <a href="tambah_pendaftar" class="btn btn-primary ">Tambah Data</a>
            <a href="{{ route('admin.pendaftaran.export') }}" class="btn btn-info" target="_blank">Export</a>
            <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#importDataModal">Import</button>
                    <hr />
                    <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="pendaftar">Data Pendaftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="orangtua">Data Orangtua</a>
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
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
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
                                <td>{{ $daftar->email }}</td>
                                <td>{{ $daftar->no_hp }}</td>
                                
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{$daftar->NISN}}/edit_pendaftar" class="btn btn-success ">EDIT</a>
                                            {!! Form::open(['url' => 'admin/pendaftar/delete/'.$daftar->NISN, 'method' => 'POST']) !!}
                                        {{ Form::button('HAPUS', ['class' => 'btn btn-danger', 'onclick' => "deleteConfirmation('".$daftar->nama."')"]) }}
                                    {!! Form::close() !!}
                                    <a href="print_bukti/{{$daftar->NISN}}" class="btn btn-primary"> Print</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pendaftaran.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="cover">Upload File</label>
                            <input type="file" class="form-control" name="file" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Import Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    @stop

    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(function() {
            $(document).on('click', function() {
                let NISN = $(this).data('NISN');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataPendaftar') }}/" + NISN,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-kode').val(res.kode_prodi);
                        $('#edit-nama').val(res.nama_prodi);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });

        @if(session('status'))
            Swal.fire({
                title: 'Congratulations!',
                text: "{{ session('status') }}",
                icon: 'Success',
                timer: 3000
            })
        @endif
        @if($errors->any())
            @php
                $message = '';
                foreach($errors->all() as $error)
                {
                    $message .= $error."<br/>";
                }
            @endphp
            Swal.fire({
                title: 'Error',
                html: "{!! $message !!}",
                icon: 'error',
            })
        @endif
        function deleteConfirmation(nama)
        {
            var form = event.target.form;
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan menghapus data dengan nama <strong>"+nama+"</strong> dan tidak dapat mengembalikannya kembali",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus saja!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        }
    </script>
    @stop