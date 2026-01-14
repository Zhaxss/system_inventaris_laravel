<?php

namespace App\Http\Controllers;

use App\Models\manajemen_barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['detail.barang'])->latest()->get();
        $barang = manajemen_barang::all();

        return view('daftar_pinjam', compact('peminjaman', 'barang'));
    }
}
