<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id'); // Relasi ke karyawan
            $table->string('hari'); // Contoh: Senin, Selasa, dst.
            $table->time('jam'); // Waktu jadwal
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};