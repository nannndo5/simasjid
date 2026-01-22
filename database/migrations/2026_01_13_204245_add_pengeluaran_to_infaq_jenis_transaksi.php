<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE infaq MODIFY COLUMN jenis_transaksi ENUM('infaq', 'sedekah', 'donasi', 'pengeluaran') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE infaq MODIFY COLUMN jenis_transaksi ENUM('infaq', 'sedekah', 'donasi') NOT NULL");
    }
};
