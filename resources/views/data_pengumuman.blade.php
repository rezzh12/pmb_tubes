@extends('layouts.master')
@section('title', 'Data Pengumuman')
@section('judul', 'Data Pengumuman')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pengumuman Mahasiswa Baru') }}</div>
            <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJadwalModal"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                    <hr />
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NISN</th>
                            <th>Status</th>
                            <th>Prodi Penerima</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($pengumuman as $png)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $png->NISN }}</td>
                                <td>{{ $png->status}}</td>
                                <td>{{ $png->prodi}}</td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-jadwal" class="btn btn-success"
                                            data-toggle="modal" data-target="#editJadwalModal"
                                            data-id="{{ $png->id }}">Edit</button>
                                            {!! Form::open(['url' => 'admin/pengumuman/delete/'.$png->id, 'method' => 'POST']) !!}
                                        {{ Form::button('HAPUS', ['class' => 'btn btn-danger', 'onclick' => "deleteConfirmation('".$png->nama_prodi."')"]) }}
                                    {!! Form::close() !!}
                                    <a href="pengumuman/email/{{$png->NISN}}" class="btn btn-warning">KIRIM EMAIL</a>
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
                    <form method="post" action="{{ route('admin.pengumuman.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" class="form-control" name="NISN" id="NISN" required />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                            <option value="Diterima">Diterima</option>
                            <option value="Tidak Diterima">Tidak Diterima </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi Penerima</label>
                            <select name="prodi" id="prodi" required>
                                @foreach($program_studi as $ps)
                                <option value="{{$ps->nama_prodi}}">{{$ps->nama_prodi}}</option>
                                @endforeach
                            </select>
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
                    <form method="post" action="{{ route('admin.pengumuman.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="edit-NISN">NISN</label>
                            <input type="text" class="form-control" name="NISN" id="edit-NISN" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-status">Status</label>
                            <select class="form-control" name="status" id="edit-status" required>
                            <option value="Diterima">Diterima</option>
                            <option value="Tidak Diterima">Tidak Diterima </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-prodi">Prodi Penerima</label>
                            <select name="prodi" id="edit-prodi" required>
                                @foreach($program_studi as $ps)
                                <option value="{{$ps->nama_prodi}}">{{$ps->nama_prodi}}</option>
                                @endforeach
                            </select>
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
                    url: "{{ url('/admin/ajaxadmin/dataPengumuman') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-NISN').val(res.NISN);
                        $('#edit-status').val(res.status);
                        $('#edit-prodi').val(res.prodi);
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