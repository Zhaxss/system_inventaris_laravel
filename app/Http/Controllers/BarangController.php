<?php

namespace App\Http\Controllers;

use App\Models\manajemen_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    function manajemen_barang()
    {
        $manajemen_barang = manajemen_barang::paginate(5);
        return view('manajemen_barang', compact('manajemen_barang'));
    }

    public function manajemen_submit(Request $request)
    {
        // Validasi input dasar
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'tipe' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data gambar dari request
        $gambar = $request->file('gambar');
        $hashGambarBaru = md5_file($gambar->getRealPath());

        // Ambil semua data barang
        $barangSama = \App\Models\manajemen_barang::all()->filter(function ($item) use ($request, $hashGambarBaru) {
            $pathGambar = public_path('uploads/' . $item->gambar);
            return strtolower($item->nama_barang) === strtolower($request->nama_barang)
                && file_exists($pathGambar)
                && md5_file($pathGambar) === $hashGambarBaru;
        })->first();

        if ($barangSama) {
            // Jika ditemukan barang dengan nama dan gambar sama
            return redirect()->back()->with('error', 'Barang dengan nama dan gambar yang sama sudah ada!');
        }

        // Simpan gambar baru
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('uploads'), $namaGambar);

        // Simpan data ke database
        $barang = new \App\Models\manajemen_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jumlah = $request->jumlah;
        $barang->tipe = $request->tipe;
        $barang->gambar = $namaGambar;
        $barang->save();

        return redirect('/manajemen_barang')->with('sukses', 'Berhasil Menambahkan Data');
    }


    function hapus($id)
    {
        $data = manajemen_barang::find($id);
        $data->delete();
        return redirect('/manajemen_barang')->with('sukses', 'Berhasil menghapus data');
    }

    function edit_submit(Request $request, $id)
    {
        $barang = manajemen_barang::findOrFail($id);

        // Cek apakah ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama kalau ada
            if ($barang->gambar && file_exists(public_path('uploads/' . $barang->gambar))) {
                unlink(public_path('uploads/' . $barang->gambar));
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads'), $namaGambar);

            $barang->gambar = $namaGambar;
        }

        // Update field lain
        $barang->nama_barang = $request->nama_barang;
        $barang->jumlah = $request->jumlah;
        $barang->tipe = $request->tipe;

        $barang->save();

        return redirect()->back()->with('sukses', 'Berhasil Mengupdate Data');
    }

    public function restore($id)
    {
        $barang = manajemen_barang::onlyTrashed()->findOrFail($id);
        $barang->restore();

        return redirect()->back()->with('sukses', 'Barang berhasil dikembalikan');
    }

    // untuk arsipkan barang
    public function delete(Request $request, $id)
    {
        if ($request->force) {
            // ambil data barang (termasuk yang dihapus)
            $barang = manajemen_barang::withTrashed()->findOrFail($id);

            // hapus file gambar dari public/img
            if ($barang->gambar) {
                $path = public_path('uploads/' . $barang->gambar);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            // hapus permanen
            $barang->forceDelete();
            $pesan = 'Barang berhasil dihapus permanen';
        } else {
            // soft delete
            $barang = manajemen_barang::findOrFail($id);
            $barang->delete();
            $pesan = 'Barang berhasil diarsipkan';
        }

        return redirect()->back()->with('sukses', $pesan);
    }

    public function arsip_tampil()
    {
        $barang = manajemen_barang::onlyTrashed()
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return view('barang_arsip', [
            'barang' => $barang
        ]);
    }
}
