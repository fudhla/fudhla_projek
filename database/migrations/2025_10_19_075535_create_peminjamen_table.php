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

            $table->unsignedBigInteger('fasilitas_id');
            $table->unsignedBigInteger('warga_id');

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tujuan');
            $table->decimal('total_biaya', 12, 2)->default(0);
            $table->string('bukti_bayar')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();

            // FK fasilitas
            $table->foreign('fasilitas_id')
                ->references('fasilitas_id')
                ->on('fasilitas_umum')
                ->onDelete('cascade');

            // FK warga (sesuaikan)
            $table->foreign('warga_id')
                ->references('id') // ← ini yang benar
                ->on('wargas')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
