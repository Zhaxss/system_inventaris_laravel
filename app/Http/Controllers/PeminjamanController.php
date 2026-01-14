<?php

namespace App\Http\Controllers;

use App\Models\manajemen_barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function peminjam_tampil()
    {
        // Jika user adalah petugas (bisa disesuaikan dengan status di tabel users)
        if (Auth::user()->status === 'petugas') {
            // 🔹 Petugas bisa melihat semua data
            $peminjaman = Peminjaman::with('detail.barang')
                ->where('status', 'dipinjam')
                ->latest()
                ->get();
        } else {
            // 🔹 User biasa hanya melihat miliknya sendiri
            $peminjaman = Peminjaman::with('detail.barang')
                ->where('user_id', Auth::id())
                ->where('status', 'dipinjam')
                ->latest()
                ->get();
        }

        $barang = manajemen_barang::all();

        return view('peminjaman.peminjaman', compact('peminjaman', 'barang'));
    }

    public function peminjaman_submit(Request $request)
    {
        $request->validate([
            'id_barang'        => 'required|array|min:1',
            'id_barang.*'      => 'exists:manajemen_barang,id',
            'jumlah_pinjam'    => 'required|array|min:1',
            'jumlah_pinjam.*'  => 'integer|min:1',
            'keperluan'        => 'required|string',
            'tanggal_pinjam'   => 'required|date',
            'batas_pengembalian'  => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        // 🔍 Cek stok barang terlebih dahulu
        foreach ($request->id_barang as $index => $idBarang) {
            $barang = manajemen_barang::find($idBarang);
            $jumlahPinjam = $request->jumlah_pinjam[$index];

            if (!$barang) {
                return redirect('/peminjaman')->with('error', "Barang dengan ID {$idBarang} tidak ditemukan!");
            }

            if ($barang->jumlah < $jumlahPinjam) {
                return redirect('/peminjaman')->with('error', "Stok barang {$barang->nama_barang} tidak mencukupi!");
            }
        }

        // ✅ Simpan data peminjaman utama
        $peminjaman = Peminjaman::create([
            'user_id'         => Auth::id(),
            'nama_peminjam'   => Auth::user()->nama_lengkap,
            'alamat'          => Auth::user()->alamat,
            'telepon'         => Auth::user()->nohp,
            'keperluan'       => $request->keperluan,
            'tanggal_pinjam'  => now(),
            'batas_pengembalian' => $request->batas_pengembalian,
            'status'          => 'dipinjam',
        ]);

        // 🔁 Simpan detail barang dan kurangi stok
        foreach ($request->id_barang as $index => $idBarang) {
            $barang = manajemen_barang::find($idBarang);
            $jumlahPinjam = $request->jumlah_pinjam[$index];

            $peminjaman->detail()->create([
                'id_barang'     => $idBarang,
                'jumlah_pinjam' => $jumlahPinjam,
            ]);

            // Kurangi stok
            $barang->decrement('jumlah', $jumlahPinjam);
        }

        return redirect('/peminjaman')->with('sukses', 'Data peminjaman berhasil ditambahkan!');
    }



    // public function peminjaman_edit(Request $request, $id)
    // {
    //     $request->validate([
    //         'id_barang'     => 'required|exists:manajemen_barang,id',
    //         'nama_peminjam' => 'required|string|max:255',
    //         'alamat'        => 'required|string',
    //         'telepon'       => 'required|string|max:20',
    //         'keperluan'     => 'required|string',
    //     ]);

    //     $peminjaman = Peminjaman::findOrFail($id);
    //     $peminjaman->update($request->all());

    //     return redirect('/peminjaman')->with('sukses', 'Data peminjaman berhasil diperbarui!');
    // }

    // // Hapus data
    // public function hapus($id)
    // {
    //     $peminjaman = Peminjaman::findOrFail($id);
    //     $peminjaman->delete();

    //     return redirect('peminjaman')->with('sukses', 'Data peminjaman berhasil dihapus!');
    // }

    public function show($id)
    {
        $query = Peminjaman::with('detail.barang');

        // Jika bukan petugas, hanya tampilkan miliknya sendiri
        if (Auth::user()->status !== 'petugas') {
            $query->where('user_id', Auth::id());
        }

        $peminjaman = $query->findOrFail($id);

        return view('peminjaman.detail', compact('peminjaman'));
    }
}
