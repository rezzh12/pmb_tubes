<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
                body {
            background-color: lavender;
        }
        .navbar-nav {
            padding-right: 50px;
        }
        .nav-item {
            padding-right: 20px;
        }
    </style>
</head>

<body>
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="image/WhatsApp Image 2022-09-22 at 14.37.01.jpeg" alt="Ophelia Film"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ URL::previous() }}">Home</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="#">Daftar</a>
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
@if($pendaftaran->isEmpty())
<div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Data Pendaftaran Mahasiswa Baru') }}</div>
            <div class="card-body">
          <h1 class="text-center"> Anda Belum Mendaftar Silahkan Daftar Terlebih Dahulu</h1>
                
            </div>
            <a href="/daftar" class="btn btn-warning ">DAFTAR</a>
        </div>
    </div>
@else
                    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Data Pendaftaran Mahasiswa Baru') }}</div>
            <div class="card-body">
    @foreach($pendaftaran as $daftar)
    <p><b> NISN :</b> {{$daftar->NISN}}</p>
    <p><b> Nama:</b> {{$daftar->nama}}</p>
    <p><b> Jenis Kelamin:</b> {{$daftar->jenis_kelamin}}</p>
    <p><b> Agama:</b> {{$daftar->agama}}</p>
    <p><b> TTL:</b> {{$daftar->tempat_lahir}},{{$daftar->tanggal_lahir}}</p>
    <p><b> No Hp:</b> {{$daftar->no_hp}}</p>
    <p><b> Email:</b> {{$daftar->email}}</p>
    <p><b> No Kwitansi:</b> {{$daftar->pembayaran->no_kwitansi}}</p>
    <p><b> Biaya Yang Harus Dibayar:</b> Rp.300.000</p>
    <p><b> Status Pembayaran:</b> {{$daftar->pembayaran->status_pembayaran}}</p>
    <br />
   
@endforeach
</div>
<a href="print_bukti/{{ Auth::user()->id }}" class="btn btn-primary ">Print</a>
        </div>
    </div>
    @endif
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>