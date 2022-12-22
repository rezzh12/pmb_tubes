<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    use SoftDeletes;  
    protected $dates = ['deleted_at'];  
    public static function getDataJadwal()
    {
        $jadwal = jadwal::all();

        $jadwals_filter = [];

        $no = 1;
        for ($i = 0; $i < $jadwal->count(); $i++) {
            $jadwals_filter[$i]['no'] = $no++;
            $jadwals_filter[$i]['nama_kegiatan'] = $jadwal[$i]->nama_kegiatan;
            $jadwals_filter[$i]['jenis_kegiatan'] = $jadwal[$i]->jenis_kegiatan;
            $jadwals_filter[$i]['tgl_mulai'] = $jadwal[$i]->tgl_mulai;
            $jadwals_filter[$i]['tgl_akhir'] = $jadwal[$i]->tgl_akhir;
           
        }

        return $jadwals_filter;
    }
}
