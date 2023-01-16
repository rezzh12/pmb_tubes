<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->char('NISN',25)->primary();
            $table->string('nama',100);
            $table->string('jenis_kelamin',25);
            $table->string('agama',25);
            $table->string('tempat_lahir',25);
            $table->string('tanggal_lahir',25);
            $table->string('alamat',255);
            $table->string('no_kk',25);
            $table->string('nama_ayah',100);
            $table->string('nama_ibu',100);
            $table->string('pekerjaan_ayah',50);
            $table->string('pekerjaan_ibu',50);
            $table->string('gaji',50);
            $table->string('tanggungan',10);
            $table->string('slip_gaji',255);
            $table->string('gelombang',25);
            $table->string('jurusan',25);
            $table->string('asal_sekolah',25);
            $table->string('alamat_sekolah',255);
            $table->string('nilai_raport',255);
            $table->string('ijazah',255);
            $table->string('prestasi',255);
            $table->string('status_pendaftaran',50);
            $table->integer('id_login');
            $table->date('tgl_pendaftaran');
            $table->string('email',100);
            $table->string('no_hp',55);
            $table->string('pas_foto',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
};