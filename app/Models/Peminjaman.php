<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{

    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'nama_peminjam',
        'alamat',
        'telepon',
        'keperluan',
        'tanggal_pinjam',
        'batas_pengembalian',
        'status',
    ];


    public function detail()
    {
        return $this->hasMany(PeminjamanDetail::class, 'peminjaman_id');
    }
    public function pengembalian()
{
    return $this->hasOne(Pengembalian::class, 'peminjaman_id');
}

}
