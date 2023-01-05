<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    
</head>

<body>
    <h1 class="text-center">Bukti Pendaftaran Kuliah</h1>
    <p class="text-center"> Tahun 2022</p>
    @foreach($pendaftarans as $daftar)
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
</body>

</html>