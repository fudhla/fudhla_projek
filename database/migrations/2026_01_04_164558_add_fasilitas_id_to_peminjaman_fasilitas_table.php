<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjaman_fasilitas', function (Blueprint $table) {
            $table->unsignedBigInteger('fasilitas_id')->after('warga_id');

            // Optional: buat foreign key
            $table->foreign('fasilitas_id')
                  ->references('fasilitas_id')
                  ->on('fasilitas_umum')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('peminjaman_fasilitas', function (Blueprint $table) {
            $table->dropForeign(['fasilitas_id']);
            $table->dropColumn('fasilitas_id');
        });
    }
};
