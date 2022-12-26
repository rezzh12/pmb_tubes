@extends('layouts.master')
@section('title', 'Edit Pendaftar')
@section('judul', 'Edit Pendaftar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Tambah Data Pendaftar</div>

                <div class="card-body">
                <form method="post" action="{{ route('admin.pendaftaran.update') }}" enctype="multipart/form-data">
                    
                        @csrf
                        @method('PATCH')
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="number" class="form-control" name="NISN" id="NISN"  require readonly />
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" required /> 
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" name="agama" id="agama" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp" required />
                        </div>
                       
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required />
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="gelombang">Gelombang</label>
                            <select name="gelombang" id="gelombang" required>
                                @foreach($jadwal as $jdl)
                                <option value="{{$jdl->nama_kegiatan}}">{{$jdl->nama_kegiatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan" required>
                                @foreach($program_studi as $ps)
                                <option value="{{$ps->nama_prodi}}">{{$ps->nama_prodi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pas_foto">Pas Foto</label>
                            <input type="file" class="form-control" name="pas_foto" id="pas_foto" required />
                        </div>
                        </div>
                        </div>
                </div>
                
            </div>
            <div class="card">
                <div class="card-header">Tambah Data Orang Tua</div>
                <div class="card-body">
                    
                        <div class="row">
                        <div class="col-md-6">
                            
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required />
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required />
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" required />
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_Ibu">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" name="pekerjaan_Ibu" id="pekerjaan_Ibu" required />
                        </div>

                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="number" class="form-control" name="no_kk" id="no_kk" required />
                        </div>
                        <div class="form-group">
                            <label for="gaji">Gaji</label>
                            <input type="number" class="form-control" name="gaji" id="gaji" required />
                        </div>

                        <div class="form-group">
                            <label for="tanggungan">Tanggungan</label>
                            <input type="number" class="form-control" name="tanggungan" id="tanggungan" required />
                        </div>

                        <div class="form-group">
                            <label for="slip_gaji">Slip Gaji</label>
                            <input type="file" class="form-control" name="slip_gaji" id="slip_gaji" required />
                        </div>
                        
                        </div>
                        </div>
                </div>
                
            </div>

            <div class="card">
                <div class="card-header">Tambah Data Sekolah</div>

                <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat_sekolah">Alamat Sekolah</label>
                            <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" required />
                        </div>
                       
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="nilai_raport">Nilai Raport</label>
                            <input type="file" class="form-control" name="nilai_raport" id="nilai_raport" required />
                        </div>
                        <div class="form-group">
                            <label for="ijazah">Ijazah</label>
                            <input type="file" class="form-control" name="ijazah" id="ijazah" required />
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input type="file" class="form-control" name="prestasi" id="prestasi"/>
                        </div>
                </div>
                
            </div>


            <div class="modal-footer">
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
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
            $(document).ready( function() {
                let NISN = $(this).data('NISN');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataPendaftar') }}/" + NISN,
                    dataType: 'json',
                    success: function(res) {
                        $('#NISN').val(res.NISN);
                        $('#nama').val(res.nama);
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