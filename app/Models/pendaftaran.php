<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{// {`id_pendaftaran` int(25) NOT NULL,
//     `id_user` varchar(15) NOT NULL,
//     `nisn` varchar(20) NOT NULL,
//     `nik` varchar(20) NOT NULL,
//     `nama_siswa` varchar(100) NOT NULL,
//     `jenis_kelamin` varchar(25) NOT NULL,
//     `pas_foto` varchar(500) NOT NULL,
//     `tempat_lahir` varchar(25) NOT NULL,
//     `tanggal_lahir` date NOT NULL,
//     `agama` varchar(25) NOT NULL,
//     `alamat` varchar(250) NOT NULL,
//     `email` varchar(100) NOT NULL,
//     `nohp` varchar(15) NOT NULL,
//     `gelombang` varchar(500) NOT NULL,
//     `tahun_masuk` year(4) NOT NULL,
//     `pil1` varchar(100) NOT NULL,
//     `pil2` varchar(100) NOT NULL,
//     `nama_ayah` varchar(100) NOT NULL,
//     `nama_ibu` varchar(100) NOT NULL,
//     `pekerjaan_ayah` varchar(50) NOT NULL,
//     `pekerjaan_ibu` varchar(50) NOT NULL,
//     `nohp_ayah` varchar(15) NOT NULL,
//     `nohp_ibu` varchar(15) NOT NULL,
//     `gaji` varchar(50) NOT NULL,
//     `tanggungan` int(5) NOT NULL,
//     `slip_gaji` varchar(500) NOT NULL,
//     `kk` varchar(500) NOT NULL,
//     `id_Sekolah` varchar(50) NOT NULL,
//     `jurusan` varchar(50) NOT NULL,
//     `smt1` double NOT NULL,
//     `smt2` double NOT NULL,
//     `smt3` double NOT NULL,
//     `smt4` double NOT NULL,
//     `smt5` double NOT NULL,
//     `nilairaport` varchar(500) NOT NULL,
//     `ijazah` varchar(500) DEFAULT NULL,
//     `prestasi` varchar(250) DEFAULT NULL,
//     `status_pendaftaran` varchar(50) NOT NULL,
//     `tgl_pendaftaran` timestamp NULL DEFAULT current_timestamp()
//   )
        use HasFactory;
        protected $guarded = ['id'];
    
        public static function getDataPendaftaran()
        {
            $pendaftaran = pendaftaran::all();
    
            $pendaftaran_filter = [];
    
            $no = 1;
            for ($i = 0; $i < $pendaftaran->count(); $i++) {
                $pendaftaran_filter[$i]['no'] = $no++;
                $pendaftaran_filter[$i]['NISN'] = $pendaftaran[$i]->NISN;
                $pendaftaran_filter[$i]['nama'] = $pendaftaran[$i]->nama;
                $pendaftaran_filter[$i]['jenis_kelamin'] = $pendaftaran[$i]->jk;
                $pendaftaran_filter[$i]['agama'] = $pendaftaran[$i]->agama;
                $pendaftaran_filter[$i]['tempat_lahir'] = $pendaftaran[$i]->tempat;
                $pendaftaran_filter[$i]['tanggal_lahir'] = $pendaftaran[$i]->tanggal;
                $pendaftaran_filter[$i]['alamat'] = $pendaftaran[$i]->alamat;
                $pendaftaran_filter[$i]['no_kk'] = $pendaftaran[$i]->no_kk;
                $pendaftaran_filter[$i]['nama_ayah'] = $pendaftaran[$i]->nama_ayah;
                $pendaftaran_filter[$i]['nama_ibu'] = $pendaftaran[$i]->nama_ibu;
                $pendaftaran_filter[$i]['pekerjaan_ayah'] = $pendaftaran[$i]->pekerjaan_ayah;
                $pendaftaran_filter[$i]['pekerjaan_ibu'] = $pendaftaran[$i]->pekerjaan_ibu;
                $pendaftaran_filter[$i]['gaji'] = $pendaftaran[$i]->gaji;
                $pendaftaran_filter[$i]['tanggungan'] = $pendaftaran[$i]->tanggungan;
                $pendaftaran_filter[$i]['slip_gaji'] = $pendaftaran[$i]->slip_gaji;
                $pendaftaran_filter[$i]['gelombang'] = $pendaftaran[$i]->gelombang;
                $pendaftaran_filter[$i]['tahun_masuk'] = $pendaftaran[$i]->tahun_masuk;
                $pendaftaran_filter[$i]['jurusan'] = $pendaftaran[$i]->jurusan;
                $pendaftaran_filter[$i]['asal_sekolah'] = $pendaftaran[$i]->asal_sekolah;
                $pendaftaran_filter[$i]['alamat_sekolah'] = $pendaftaran[$i]->alamat_sekolah;
                $pendaftaran_filter[$i]['nilai_raport'] = $pendaftaran[$i]->nilai_raport;
                $pendaftaran_filter[$i]['ijazah'] = $pendaftaran[$i]->ijazah;
                $pendaftaran_filter[$i]['prestasi'] = $pendaftaran[$i]->prestasi;
                $pendaftaran_filter[$i]['status_pendaftaran'] = $pendaftaran[$i]->status_pendaftaran;
                $pendaftaran_filter[$i]['tgl_pendaftaran'] = $pendaftaran[$i]->tgl_pendaftaran;
                $pendaftaran_filter[$i]['email'] = $pendaftaran[$i]->email;
                $pendaftaran_filter[$i]['no_hp'] = $pendaftaran[$i]->no_hp;
                $pendaftaran_filter[$i]['pas_foto'] = $pendaftaran[$i]->pas_foto;
            }
    
            return $pendaftaran_filter;
        }
}
