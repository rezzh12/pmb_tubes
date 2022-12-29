<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    use HasFactory;
    public static function getDataPembayaran()
    {
        $pengumuman = pengumuman::all();

        $pengumuman_filter = [];

        $no = 1;
        for ($i = 0; $i < $pengumuman->count(); $i++) {
            $pengumuman_filter[$i]['no'] = $no++;
            $pengumuman_filter[$i]['NISN'] = $pengumuman[$i]->NISN;
            $pengumuman_filter[$i]['status'] = $pengumuman[$i]->status;
            $pengumuman_filter[$i]['prodi'] = $pengumuman[$i]->prodi;
           
        }

        return $pengumuman_filter;
    }

    public function pengumuman()
    {
        return $this->belongsTo(pendaftaran::class, 'NISN')
                        ->withDefault(['status_pembayaran' => 'Belum Ada Status']);
    }
}
