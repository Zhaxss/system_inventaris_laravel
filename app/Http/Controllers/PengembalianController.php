<?php

namespace App\Http\Controllers;

use App\Models\manajemen_barang;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{

    public function pengembalian_tampil()
    {
        if (Auth::user()->status === 'petugas') {
            // Petugas melihat semua
            $peminjaman = Peminjaman::where('status', 'dikembalikan')->latest()->get();
        } else {
            // User hanya melihat miliknya
            $peminjaman = Peminjaman::where('status', 'dikembalikan')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        $barang = manajemen_barang::all();

        return view('pengembalian.index', compact('peminjaman', 'barang'));
    }


    public function show($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('pengembalian.detail', compact('peminjaman'));
    }

    public function store(Request $request, $id)
    {
        $peminjaman = Peminjaman::with('detail.barang')->findOrFail($id);

        // 🔹 Cegah duplikasi pengembalian
        if ($peminjaman->status === 'dikembalikan') {
            return redirect('/peminjaman')->with('error', 'Peminjaman ini sudah dikembalikan.');
        }

        // 🔹 Ambil tanggal kembali (batas yang ditentukan saat pinjam)
        $tanggalKembali = \Carbon\Carbon::parse($peminjaman->tanggal_kembali);

        // 🔹 Update jam-nya jadi waktu aktual pengembalian
        $tanggalKembali->setTimeFromTimeString(now('Asia/Jakarta')->format('H:i:s'));

        // 🔹 Update status dan waktu pengembalian
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => $tanggalKembali,
        ]);

        // 🔹 Simpan data pengembalian
        Pengembalian::create([
            'user_id' => Auth::id(),
            'peminjaman_id' => $peminjaman->id,
            'tanggal_pengembalian' => now('Asia/Jakarta'),
        ]);

        // 🔹 Kembalikan stok sesuai jumlah yang dipinjam
        foreach ($peminjaman->detail as $detail) {
            if ($detail->barang) {
                $detail->barang->increment('jumlah', $detail->jumlah_pinjam); // ✅ benar
            }
        }

        return redirect('/peminjaman')->with('sukses', 'Semua barang berhasil dikembalikan!');
    }
}
