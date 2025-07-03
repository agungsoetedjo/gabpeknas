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
        Schema::create('kabupaten_kota', function (Blueprint $table) {
            $table->string('kode_kab_kota', 10)->primary(); // Kode kabupaten/kota sebagai primary key
            $table->string('kab_kota');
            $table->string('kode_provinsi');
            $table->foreign('kode_provinsi')->references('kode')->on('provinsi')->onDelete('cascade');
            $table->boolean('is_ibu_kota')->default(false);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupaten_kota');
    }
};
