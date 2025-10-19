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
        Schema::create('fasilitas_umum', function (Blueprint $table) {
            $table->increments('fasilitas_id');
            $table->string('nama', 100);
            $table->string('jenis', 100);
            $table->string('alamat', 100);
            $table->string('rt', 25);
            $table->string('rw', 25);
            $table->string('kapasitas', 25);
            $table->string('deskripsi', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_umum');
    }
};
