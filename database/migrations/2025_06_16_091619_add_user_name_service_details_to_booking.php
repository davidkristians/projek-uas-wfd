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
            $table->string('user_name')->after('user_id')->nullable(); // Kolom untuk nama user
            $table->string('service_name')->after('service_id')->nullable(); // Kolom untuk nama layanan
            $table->decimal('service_price', 8, 2)->after('service_name')->nullable(); // Kolom untuk harga layanan
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['user_name', 'service_name', 'service_price']);
        });
    }
};
