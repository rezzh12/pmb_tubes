@extends('layouts.master')
@section('title', 'Data Pembayaran')
@section('judul', 'Data Pembayaran')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pembayaran Mahasiswa Baru') }}</div>
            <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJadwalModal"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                    <hr />
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>No Kwitansi</th>
                            <th>Status Pembayaran</th>
                            <th>Tanggal Bayar</th>
                            <th>NISN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($pembayaran as $bayar)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $bayar->no_kwitansi }}</td>
                                <td>{{ $bayar->status_pembayaran}}</td>
                                <td>{{ $bayar->tgl_pembayaran }}</td>
                                <td>{{ $bayar->NISN }}</td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-jadwal" class="btn btn-success"
                                            data-toggle="modal" data-target="#editJadwalModal"
                                            data-id="{{ $bayar->id }}">Edit</button>
                                            {!! Form::open(['url' => 'admin/pembayaran/delete/'.$bayar->id, 'method' => 'POST']) !!}
                                        {{ Form::button('HAPUS', ['class' => 'btn btn-danger', 'onclick' => "deleteConfirmation('".$bayar->no_kwitansi."')"]) }}
                                    {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahJadwalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pembayaran.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="no_kwitansi">No Kwitansi</label>
                            <input type="text" class="form-control" name="no_kwitansi" id="no_kwitansi" required />
                        </div>
                        <div class="form-group">
                            <label for="status_pembayaran">Status Pembayaran</label>
                           <select class="form-control" name="status_pembayaran" id="status_pembayaran">
                            <option value="Gratis">Gratis</option>
                            <option value="Sudah Bayar">Sudah Bayar</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembayaran">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" required />
                        </div>
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" class="form-control" name="NISN" id="NISN" required />
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Ubah Data-->
     <!-- UBAH DATA -->
     <div class="modal fade" id="editJadwalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pembayaran.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="edit-kwitansi">No Kwitansi</label>
                            <input type="text" class="form-control" name="no_kwitansi" id="edit-kwitansi" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-status">Status Pembayaran</label>
                           <select class="form-control" name="status_pembayaran" id="edit-status">
                            <option value="Gratis">Gratis</option>
                            <option value="Sudah Bayar">Sudah Bayar</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-tanggal">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" name="tanggal_pembayaran" id="edit-tanggal" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-NISN">NISN</label>
                            <input type="text" class="form-control" name="NISN" id="edit-NISN" required />
                        </div>

                </div>
                <div class="modal-footer">
                <input type="hidden" name="id" id="edit-id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Update</button>
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