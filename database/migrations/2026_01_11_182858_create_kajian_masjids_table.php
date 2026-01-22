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
        Schema::create('kajian_masjids', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->text('konten')->nullable();
            $table->string('ustadz')->nullable();
            $table->date('tanggal_kajian')->nullable();
            $table->time('waktu_kajian')->nullable();
            $table->string('tempat')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kajian_masjids');
    }
};
