<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'NISN','status','prodi'];
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

    public function pendaftar()
    {
        return $this->belongsTo(pendaftaran::class, 'NISN')
                        ->withDefault(['status' => 'Belum Ada Status']);
    }
}
