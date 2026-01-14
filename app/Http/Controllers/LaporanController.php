<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Query dasar: ambil semua data + relasi
        $query = Peminjaman::with(['detail.barang'])
            ->orderBy('created_at', 'desc');

        // Jika bukan petugas → hanya tampilkan miliknya
        if ($user->status !== 'petugas') {
            $query->where('user_id', $user->id);
        }

        // Filter berdasarkan status (opsional)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $peminjaman = $query->get();

        return view('laporan.index', compact('peminjaman'));
    }

    public function cetak(Request $request)
    {
        $user = Auth::user();

        $query = Peminjaman::with(['detail.barang'])
            ->orderBy('tanggal_pinjam', 'desc');

        // Filter role user
        if ($user->status !== 'petugas') {
            $query->where('user_id', $user->id);
        }

        // Filter status (opsional)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $peminjaman = $query->get();

        $pdf = Pdf::loadView('laporan.cetak', compact('peminjaman'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('laporan-peminjaman.pdf');
    }
}
