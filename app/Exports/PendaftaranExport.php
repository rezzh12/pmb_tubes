<?php

namespace App\Exports;

use App\Models\pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftaranExport implements FromArray, withHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function Array(): array
    {
        return pendaftaran::getDataPendaftaran();
    }
    public function headings(): array
    {
        return [
            'No',
            'NISN',
            'Nama',
            'Jenis Kelamin',
            'Agama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'No KK',
            'Nama Ayah',
            'Nama Ibu',
            'Pekerjaan Ayah',
            'Pekerjaan Ibu',
            'Gaji',
            'Tanggungan',
            'Gelombang',
            'Jurusan',
            'Asal Sekolah',
            'Alamat Sekolah',
            'Status Pendaftaran',
            'Tanggal Pendaftaran',
            'Email',
            'No HP',
        ];
    }
}
