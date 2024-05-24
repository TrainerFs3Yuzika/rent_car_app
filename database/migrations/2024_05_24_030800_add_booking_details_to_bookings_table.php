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
            $table->integer('durasi_sewa')->nullable();
            $table->dateTime('awal_penyewaan')->nullable();
            $table->dateTime('pengembalian_penyewaan')->nullable();
            $table->string('status_penyewaan')->default('pending');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('durasi_sewa');
            $table->dropColumn('awal_penyewaan');
            $table->dropColumn('pengembalian_penyewaan');
            $table->dropColumn('status_penyewaan');
        });
        
    }
};
