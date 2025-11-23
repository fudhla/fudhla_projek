<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('peminjaman_fasilitas', function (Blueprint $table) {
            $table->id('pinjam_id');

            // Hanya relasi warga
            $table->unsignedBigInteger('warga_id');

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tujuan');
            $table->decimal('total_biaya', 12, 2)->default(0);
            $table->string('bukti_bayar')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();

            // Foreign key warga
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
