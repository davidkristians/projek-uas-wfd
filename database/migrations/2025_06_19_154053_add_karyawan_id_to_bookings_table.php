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
        Schema::table('bookings', function (Blueprint $table) {
            // Kolom ini bisa NULL karena booking awalnya mungkin belum ditugaskan.
            // Kolom ini akan diletakkan setelah kolom 'service_id'.
            $table->foreignId('karyawan_id')
                ->nullable()
                ->after('service_id')
                ->constrained('karyawans')
                ->onDelete('set null'); // Jika karyawan dihapus, tugasnya menjadi null (tidak ikut terhapus)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
