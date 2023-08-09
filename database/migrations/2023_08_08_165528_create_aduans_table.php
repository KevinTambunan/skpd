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
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_perangkat_daerah');
            $table->bigInteger('nip_pemohon');
            $table->string('nama_penanggung_jawab');

            $table->string('jabatan_pemohon');
            $table->bigInteger('no_telp_pemohon');
            $table->string('email_pemohon');
            $table->string('nama_lokasi');
            $table->string('kondisi_lokasi');
            $table->string('alamat_lokasi');
            $table->string('kota_kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('rt');
            $table->string('rw');
            $table->string('kecepatan_internet');
            $table->string('dokumen_penunjang_akses');
            $table->string('gambar_lokasi');
            $table->string('status');
            $table->text('alasan');

            $table->foreign('user_id')->on('users')->references('id');
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
        Schema::dropIfExists('aduans');
    }
};
