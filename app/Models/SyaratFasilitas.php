<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

class SyaratFasilitas extends Model
{
    protected $table = 'syarat_fasilitas';
    protected $primaryKey = 'syarat_id';

    protected $fillable = [
        'fasilitas_id',
        'nama_syarat',
        'deskripsi'
    ];
     public function Media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'syarat_id')
            ->where('ref_table', 'syarat_fasilitas');
    }
}

