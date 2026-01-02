<?php
namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

class PembayaranFasilitas extends Model
{
    protected $table      = 'pembayaran_fasilitas';
    protected $primaryKey = 'bayar_id';

    protected $fillable = [
        'pinjam_id',
        'tanggal',
        'jumlah',
        'metode',
        'keterangan',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'bayar_id')
            ->where('ref_table', 'pembayaran_fasilitas');
    }
}
