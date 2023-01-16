<?php

namespace App\Imports;

use App\Models\pendaftaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class PendaftaranImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array  $row)
    {
        return new pendaftaran([
            'NISN' => $row['NISN'],
            'Nama'  => $row['nama'],
            'Jenis Kelamin'  => $row['jenis_kelamin'],
            'Agama'  => $row['agama'],
            'Tempat Lahir'  => $row['tempat_lahir'],
            'Tanggal Lahir'  => $row['tanggal_lahir'],
            'Alamat'  => $row['alamat'],
            'No KK'  => $row['no_kk'],
            'Nama Ayah'  => $row['nama_ayah'],
            'Nama Ibu'  => $row['nama_ibu'],
            'Pekerjaan Ayah'  => $row['pekerjaan_ayah'],
            'Pekerjaan Ibu' => $row['pekerjaan_ibu'],
            'Gaji'  => $row['gaji'],
            'Tanggungan'  => $row['tanggungan'],
            'Slip Gaji'  => $row['slip_gaji'],
            'Gelombang'  => $row['gelombang'],
            'Jurusan'  => $row['jurusan'],
            'Asal Sekolah'  => $row['asal_sekolah'],
            'Alamat Sekolah'  => $row['alamat_sekolah'],
            'Nilai Raport '  => $row['nilai_raport'],
            'Ijazah '  => $row['ijazah'],
            'Prestasi '  => $row['prestasi'],
            'Status Pendaftaran'  => $row['status_pendaftaran'],
            'Tanggal Pendaftaran'  => $row['tgl_pendaftaran'],
            'Email'  => $row['email'],
            'No HP'  => $row['no_hp'],
            'Pas Foto'  => $row['pas_foto'],
            'Id Login'  => $row['id_login'],
            'Created At'  => $row['created_at'],
            'Updated At'  => $row['updated_at'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
    public function rules(): array
    {
        return [
            'NISN' => 'required',
            'Nama'  =>'required',
            'Jenis Kelamin'  => 'required',
            'Agama'  => 'required',
            'Tempat Lahir'  => 'required',
            'Tanggal Lahir'  => 'required',
            'Alamat'  =>'required',
            'No KK'  => 'required',
            'Nama Ayah'  => 'required',
            'Nama Ibu'  => 'required',
            'Pekerjaan Ayah'  => 'required',
            'Pekerjaan Ibu' =>'required',
            'Gaji'  => 'required',
            'Tanggungan'  => 'required',
            'Slip Gaji'  =>'required',
            'Gelombang'  => 'required',
            'Jurusan'  => 'required',
            'Asal Sekolah'  =>'required',
            'Alamat Sekolah'  => 'required',
            'Nilai Raport '  => 'required',
            'Ijazah '  => 'required',
            'Prestasi '  => 'required',
            'Status Pendaftaran'  => 'required',
            'Tanggal Pendaftaran'  => 'required',
            'Email'  => 'required',
            'No HP'  => 'required',
            'Pas Foto'  => 'required',
            'Id Login'  => 'required',
            'Created At'  => 'required',
            'Updated At'  => 'required',
        ];
    }
}
