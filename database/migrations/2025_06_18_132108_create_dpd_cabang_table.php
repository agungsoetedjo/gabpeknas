<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dpd_cabang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_provinsi');
            $table->foreign('kode_provinsi')->references('kode')->on('provinsi')->onDelete('cascade');
            $table->string('kab_kota')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_ketua')->nullable();
            $table->string('nama_sekretaris')->nullable();
            $table->string('nama_bendahara')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpd_cabang');
    }
};
