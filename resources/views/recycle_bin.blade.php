@extends('layouts.master')
@section('title', 'Data Recycle Bin')
@section('judul', 'Data Recycle Bin')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Recycle Bin Data Mahasiswa Baru') }}</div>
            <div class="card-body">
            {!! Form::open(['url' => 'admin/recycle_bin/restore/all', 'method' => 'POST']) !!}
                        {{ Form::submit('Restore All', ['class' => 'btn btn-primary']) }}
                    {!! Form::close() !!}

                    {!! Form::open(['url' => 'admin/recycle_bin/empty', 'method' => 'POST']) !!}
                        {{ Form::submit('Empty', ['class' => 'btn btn-danger ']) }}
                    {!! Form::close() !!}
                    <hr />
                <table id="table-data" class="table table-bordered">
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
                        @foreach ($trash as $tr)
                            <tr>
                            <td>{{ $no++ }}</td>
                                <td>{{ $tr->NISN}}</td>
                                <td>{{ $tr->nama}}</td>
                                <td>{{ $tr->jenis_kelamin }}</td>
                                <td>{{ $tr->agama }}</td>
                                <td>{{ $tr->alamat }}</td>
                                <td>{{ $tr->email }}</td>
                                <td>{{ $tr->no_hp }}</td>
                                <td>
                                {!! Form::open(['url' => 'admin/recycle_bin/'.$tr->NISN.'/restore', 'method' => 'POST']) !!}
                                        {{ Form::submit('Restore', ['class' => 'btn btn-success ']) }}
                                    {!! Form::close() !!}

                                    {!! Form::open(['url' => 'admin/recycle_bin/'.$tr->NISN.'/delete', 'method' => 'POST']) !!}
                                        {{ Form::submit('Destroy', ['class' => 'btn btn-danger ']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop
    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(function() {
            $(document).on('click', '#btn-edit-jadwal', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataPembayaran') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-kwitansi').val(res.no_kwitansi);
                        $('#edit-status').val(res.status_pembayaran);
                        $('#edit-tanggal').val(res.tgl_pembayaran);
                        $('#edit-NISN').val(res.NISN);
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
       
    </script>
    @stop