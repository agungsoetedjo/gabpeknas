<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota_bujk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bujk');
            $table->string('kualifikasi');
            $table->date('tgl_pembuatan')->nullable();
            $table->date('tgl_berakhir')->nullable();
            $table->string('nomor_kta')->nullable();
            $table->string('kode_provinsi');
            $table->string('kode_kab_kota')->nullable();
            $table->foreign('kode_provinsi')->references('kode')->on('provinsi')->onDelete('cascade');
            $table->foreign('kode_kab_kota')->references('kode_kab_kota')->on('kabupaten_kota')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_bujk');
    }
};
