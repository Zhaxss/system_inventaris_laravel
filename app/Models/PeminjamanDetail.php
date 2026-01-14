<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_detail';

    protected $fillable = [
        'peminjaman_id',
        'id_barang',
        'jumlah_pinjam',
    ];

    // 🔗 Relasi ke barang
    public function barang()
    {
        // Gunakan withTrashed() supaya barang yang sudah dihapus soft delete tetap bisa ditampilkan
        return $this->belongsTo(manajemen_barang::class, 'id_barang')->withTrashed();
    }

    // 🔗 Relasi ke peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}
