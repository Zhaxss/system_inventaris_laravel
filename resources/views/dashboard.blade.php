@extends('layouts.app')
@section('title', 'Halaman Dashboard')
@section('konten')

    <!-- Page Header -->
    <div class="page-header">
        <h2>
            <i class="bi bi-speedometer2 me-2"></i>
             Dashboard
        </h2>
        <p>Halo, <strong>{{ Auth::user()->username }}</strong> - Anda login sebagai
            <strong>{{ ucfirst(Auth::user()->status) }}</strong></p>
    </div>

    <!-- Menu Cards Grid -->
    <div class="card-grid">
        @if (Auth::user()->status == 'petugas')
            <a href="/manajemen_barang" class="menu-card">
                <div class="card-image-wrapper">
                    <img src="/img/manajemen_barang.png" alt="Manajemen Barang">
                </div>
                <div class="card-content">
                    <h5>
                        <i class="bi bi-box-seam"></i>
                        Manajemen Barang
                    </h5>
                    <p>Kelola data inventaris barang</p>
                </div>
            </a>

            <a href="/daftar_pinjam" class="menu-card">
                <div class="card-image-wrapper">
                    <img src="/img/daftar.jpg" alt="Daftar Pinjaman">
                </div>
                <div class="card-content">
                    <h5>
                        <i class="bi bi-clipboard-check"></i>
                        Daftar Pinjaman
                    </h5>
                    <p>Lihat dan kelola peminjaman</p>
                </div>
            </a>

            <a href="/laporan" class="menu-card">
                <div class="card-image-wrapper">
                    <img src="/img/laporan.png" alt="Laporan">
                </div>
                <div class="card-content">
                    <h5>
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        Laporan
                    </h5>
                    <p>Cetak dan lihat laporan data</p>
                </div>
            </a>
        @endif

        @if (Auth::user()->status == 'peminjam')
            <a href="/peminjaman" class="menu-card">
                <div class="card-image-wrapper">
                    <img src="/img/pinjam.png" alt="Peminjaman Barang">
                </div>
                <div class="card-content">
                    <h5>
                        <i class="bi bi-cart-plus"></i>
                        Peminjaman Barang
                    </h5>
                    <p>Ajukan peminjaman barang</p>
                </div>
            </a>

            <a href="/pengembalian" class="menu-card">
                <div class="card-image-wrapper">
                    <img src="/img/pengembalian.png" alt="Pengembalian Barang">
                </div>
                <div class="card-content">
                    <h5>
                        <i class="bi bi-arrow-return-left"></i>
                        Pengembalian Barang
                    </h5>
                    <p>Kembalikan barang yang dipinjam</p>
                </div>
            </a>

            <a href="/laporan" class="menu-card">
                <div class="card-image-wrapper">
                    <img src="/img/laporan.png" alt="Laporan">
                </div>
                <div class="card-content">
                    <h5>
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        Laporan
                    </h5>
                    <p>Lihat riwayat peminjaman</p>
                </div>
            </a>
        @endif
    </div>

@endsection
