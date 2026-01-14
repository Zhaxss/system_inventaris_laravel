<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class manajemen_barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'manajemen_barang';

    protected $fillable = [
        'nama_barang',
        'jumlah',
        'tipe',
        'gambar',
    ];

    // 🔗 Relasi ke tabel detail peminjaman
    public function detailPeminjaman()
    {
        return $this->hasMany(PeminjamanDetail::class, 'id_barang');
    }
}
