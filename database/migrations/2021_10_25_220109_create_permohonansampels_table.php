<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansampelsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('permohonansampels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('jenis_permohonan_id')->unsigned();
            $table->string('kode');
            $table->string('jenis');
            $table->string('nama');
            $table->string('hp')->nullable();
            $table->text('alamat')->nullable();
            $table->bigInteger('total')->default(0);
            $table->integer('status')->default(0);
            $table->integer('verifikasi_cs')->default(0);
            $table->integer('verifikasi_pemohon')->default(0);
            $table->integer('status_pembayaran')->default(0);
            $table->date('tgl_diterima')->nullable();
            $table->string('jenis_sampel')->nullable();
            $table->string('spesies')->nullable();
            $table->string('kode_sampel')->nullable();
            $table->string('negara_tujuan')->nullable();
            $table->string('jumlah_sampel')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->text('pesan_dikembalikan')->nullable();
            $table->date('tgl_pengujian')->nullable();
            $table->string('kode_sampel_lab')->nullable();
            $table->string('nomor_referensi')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('nomor_sertifikat')->nullable();
            $table->date('tgl_sertifikat')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->integer('kembalikan_verifikator')->default(0);
            $table->date('date_kembalikan_verifikator')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jenis_permohonan_id')->references('id')->on('jps')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('permohonansampels');
    }
}
