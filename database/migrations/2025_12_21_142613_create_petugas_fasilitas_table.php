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
        Schema::create('petugas_fasilitas', function (Blueprint $table) {
            $table->id('petugas_id');

            $table->unsignedBigInteger('fasilitas_id');
            $table->unsignedBigInteger('petugas_warga_id');

            $table->string('peran');
            $table->timestamps();

            $table->foreign('fasilitas_id')
                ->references('fasilitas_id')
                ->on('fasilitas_umum')
                ->onDelete('cascade');

            $table->foreign('petugas_warga_id')
                ->references('id')
                ->on('wargas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas_fasilitas');
    }

};
