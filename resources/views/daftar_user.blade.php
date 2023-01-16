<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('images/download (1).png')}}" alt="PMB TEKNIK"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="home">Home</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="#daftar">Daftar</a>
                </li>
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            </ul>
            </div>
        </div>
        </nav>
        <hr>
        <hr>
        <hr>

        <div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Tambah Data Pendaftar</div>

                <div class="card-body">
                <form method="post" action="{{ route('admin.pendaftaran.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="number" class="form-control" name="NISN" id="NISN" required />
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
                        <div></div>
                        <div class="form-group">
                            <select name="id_login" id="id_login" type="hidden" required>
                                <option value=" {{ Auth::user()->id }}"></option>
                            </select>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        let navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function(){
            let scroll = window.scrollY;

            if(scroll > 80){
                navbar.classList.add('navbar-white bg-light');
                navbar.classList.add('bg-dark-dark bg-dark');
            
            } else {
                navbar.classList.remove('navbar-white bg-light');
                navbar.classList.add('navbar-dark bg-dark');
            }
        });
    </script>
    
</body>
</html>