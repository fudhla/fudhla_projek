<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanFasilitas extends Model
{
    use HasFactory;

    protected $primaryKey = 'pinjam_id'; // pastikan sesuai DB

    protected $fillable = [
        'fasilitas_id',
        'warga_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'tujuan',
        'total_biaya',
        'status',
    ];

    // RELASI KE WARGA
    public function warga() {
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }

    // RELASI KE MEDIA
    public function media() {
        return $this->hasMany(Media::class, 'ref_id', 'pinjam_id')
                    ->where('ref_table', 'peminjaman_fasilitas');
    }

    // RELASI KE FASILITAS UMUM
    public function fasilitas() {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id', 'fasilitas_id');
    }
}
