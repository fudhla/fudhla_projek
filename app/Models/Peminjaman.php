<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table    = 'peminjaman';
    protected $fillable = [
        'nama_peminjam',
        'no_ktp',
        'kontak',
        'fasilitas_id',
        'tujuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'surat_permohonan',
        'keterangan',
        'status',
    ];

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }
}
