<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['no_kwitansi'];
    protected $primaryKey = 'no_kwitansi';
    protected $fillable = ['no_kwitansi', 'status_pemabayaran','tgl_pembayaran','NISN'];
    public static function getDataPembayaran()
    {
        $pembayaran = pembayaran::all();

        $pembayaran_filter = [];

        $no = 1;
        for ($i = 0; $i < $pembayaran->count(); $i++) {
            $pembayaran_filter[$i]['no'] = $no++;
            $pembayaran_filter[$i]['no_kwitansi'] = $pembayaran[$i]->no_kwitansi;
            $pembayaran_filter[$i]['status_pemabayaran'] = $pembayaran[$i]->status_pembayaran;
            $pembayaran_filter[$i]['tgl_pembayaran'] = $pembayaran[$i]->tgl_pembayaran;
            $pembayaran_filter[$i]['NISN'] = $pembayaran[$i]->NISN;
           
        }

        return $pembayaran_filter;
    }
}
