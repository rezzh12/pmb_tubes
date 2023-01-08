<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pendaftaran extends Model
{
        use HasFactory;
        use SoftDeletes;
        protected $guarded = ['id'];
        protected $primaryKey = 'NISN';
        protected $fillable = ['NISN', 'nama', 'jenis_kelamin','agama','tempat_lahir','tanggal_lahir','alamat',
    'no_kk','nama_ayah','nama_ibu','pekerjaan_ayah','pekerjaan_ibu','gaji','tanggungan','slip_gaji',
'gelombang','jurusan','asal_sekolah','alamat_sekolah','nilai_raport','ijazah','prestasi',
'status_pendaftaran','tgl_pendaftaran','email','no_hp','pas_foto','id_login'];
    
        public static function getDataPendaftaran()
        {
            $pendaftaran = pendaftaran::all();
    
            $pendaftaran_filter = [];
    
            $no = 1;
            for ($i = 0; $i < $pendaftaran->count(); $i++) {
                $pendaftaran_filter[$i]['no'] = $no++;
                $pendaftaran_filter[$i]['NISN'] = $pendaftaran[$i]->NISN;
                $pendaftaran_filter[$i]['nama'] = $pendaftaran[$i]->nama;
                $pendaftaran_filter[$i]['jenis_kelamin'] = $pendaftaran[$i]->jenis_kelamin;
                $pendaftaran_filter[$i]['agama'] = $pendaftaran[$i]->agama;
                $pendaftaran_filter[$i]['tempat_lahir'] = $pendaftaran[$i]->tempat_lahir;
                $pendaftaran_filter[$i]['tanggal_lahir'] = $pendaftaran[$i]->tanggal_lahir;
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
                $pendaftaran_filter[$i]['id_login'] = $pendaftaran[$i]->id_login;
                $pendaftaran_filter[$i]['created_at'] = $pendaftaran[$i]->created_at;
                $pendaftaran_filter[$i]['updated_at'] = $pendaftaran[$i]->updated_at;
            }
    
            return $pendaftaran_filter;
        }

        public function pembayaran()
        {
            return $this->belongsTo(pembayaran::class, 'NISN')
                            ->withDefault(['status_pembayaran' => 'Belum Dibayar']);
        }
        public function pengumuman()
        {
            return $this->belongsTo(pengumuman::class, 'NISN')
                            ->withDefault(['status' => 'Belum Ada Status']);
        }
}
