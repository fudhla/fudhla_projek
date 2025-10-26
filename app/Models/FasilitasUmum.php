<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasUmum extends Model
{
    // Nama tabel sesuai migration
    protected $table = 'fasilitas_umum';

    // Primary key sesuai migration
    protected $primaryKey = 'fasilitas_id';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nama', 'jenis', 'alamat', 'rt', 'rw', 'kapasitas', 'deskripsi', 'media'
    ];

    // Jika ingin auto timestamps (created_at, updated_at)
    public $timestamps = true;
}
