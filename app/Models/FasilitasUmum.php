<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasUmum extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_umum';
    protected $primaryKey = 'fasilitas_id'; // sudah benar
    public $incrementing = true;             // tambahkan ini kalau auto-increment
    protected $keyType = 'int';              // tipe primary key integer

    protected $fillable = [
        'nama',
        'jenis',
        'alamat',
        'rt',
        'rw',
        'kapasitas',
        'deskripsi',
        'foto',
    ];
    public function getRouteKeyName()
    {
        return 'fasilitas_id';
    }
}
