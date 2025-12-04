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
        Schema::create('peminjaman_fasilitas', function (Blueprint $table) {
            $table->id('pinjam_id');

            // relasi warga
            $table->unsignedBigInteger('warga_id');

            // fasilitas yang dipinjam
            $table->string('fasilitas');

            // tanggal
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            // tujuan peminjaman
            $table->string('tujuan');

            // biaya
            $table->decimal('total_biaya', 12, 2)->default(0);

            // status: Pending, Disetujui, Ditolak
            $table->string('status')->default('Pending');

            $table->timestamps();

            // foreign key
            $table->foreign('warga_id')
                ->references('id')
                ->on('wargas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_fasilitas');
    }
};
