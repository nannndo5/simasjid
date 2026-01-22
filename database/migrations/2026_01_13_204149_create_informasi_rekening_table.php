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
        Schema::create('informasi_rekening', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('nama_bank_1')->nullable();
            $table->string('no_rekening_1')->nullable();
            $table->string('nama_bank_2')->nullable();
            $table->string('no_rekening_2')->nullable();
            $table->string('nama_bank_3')->nullable();
            $table->string('no_rekening_3')->nullable();
            $table->string('no_whatsapp')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_rekening');
    }
};
