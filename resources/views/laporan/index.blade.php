<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body {
        background: #f5f7fa;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-container {
        padding: 2rem 0;
    }

    .page-header {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .page-header h2 {
        color: #2d3748;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .page-header .icon-wrapper {
        width: 50px;
        height: 50px;
        background: #4a5568;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .filter-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .filter-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-select,
    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.65rem 1rem;
        transition: all 0.3s ease;
    }

    .form-select:focus,
    .form-control:focus {
        border-color: #4a5568;
        box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
    }

    .btn-action {
        padding: 0.65rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary-custom {
        background: #4a5568;
        color: white;
    }

    .btn-primary-custom:hover {
        background: #2d3748;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 85, 104, 0.3);
    }

    .btn-danger-custom {
        background: #e53e3e;
        color: white;
    }

    .btn-danger-custom:hover {
        background: #c53030;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(229, 62, 62, 0.3);
    }

    .btn-secondary-custom {
        background: white;
        color: #4a5568;
        border: 2px solid #e2e8f0;
    }

    .btn-secondary-custom:hover {
        background: #f7fafc;
        border-color: #cbd5e0;
    }

    .table-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .table {
        margin: 0;
    }

    .table thead th {
        background: #4a5568;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border: none;
        padding: 1rem;
        vertical-align: middle;
    }

    .table thead th:first-child {
        border-radius: 10px 0 0 0;
    }

    .table thead th:last-child {
        border-radius: 0 10px 0 0;
    }

    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #e2e8f0;
    }

    .table tbody tr:hover {
        background-color: #f7fafc;
        transform: scale(1.01);
    }

    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
        color: #4a5568;
    }

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .badge-dipinjam {
        background: #fbbf24;
        color: #78350f;
    }

    .badge-dikembalikan {
        background: #10b981;
        color: white;
    }

    .item-list {
        margin: 0;
        padding-left: 0;
        list-style: none;
    }

    .item-list li {
        padding: 0.25rem 0;
        color: #4a5568;
    }

    .item-list li:before {
        content: "•";
        color: #4a5568;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-right: 0.5rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #a0aec0;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 768px) {

        .page-header,
        .filter-card,
        .table-card {
            padding: 1.5rem;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
    }
</style>

<div class="main-container">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h2>
                <div class="icon-wrapper">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                </div>
                Laporan Peminjaman Barang
            </h2>
        </div>

        <!-- Filter Section -->
        <div class="filter-card">
            <div class="filter-title">
                <i class="bi bi-funnel"></i>
                Filter & Pencarian
            </div>
            <form method="GET" action="{{ route('laporan.index') }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">
                            <i class="bi bi-tag me-1"></i>Status Peminjaman
                        </label>
                        <select name="status" class="form-select">
                            <option value="">🔍 Semua Status</option>
                            <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>
                                📦 Dipinjam
                            </option>
                            <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>
                                ✅ Dikembalikan
                            </option>
                        </select>
                    </div>

                    <div class="col-md-8 d-flex align-items-end gap-2 flex-wrap">
                        <a href="/dashboard" class="btn btn-secondary-custom btn-action">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary-custom btn-action">
                            <i class="bi bi-search"></i>
                            Cari Data
                        </button>
                        <a href="{{ route('laporan.cetak', request()->query()) }}" target="_blank"
                            class="btn btn-danger-custom btn-action">
                            <i class="bi bi-printer"></i>
                            Cetak Laporan
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="table-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama Peminjam</th>
                            <th>Barang Dipinjam</th>
                            <th>Keperluan</th>
                            <th style="width: 140px;">Tanggal Pinjam</th>
                            <th style="width: 140px;">Tanggal Kembali</th>
                            <th style="width: 150px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjaman as $item)
                            <tr>
                                <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $item->nama_peminjam }}</div>
                                </td>
                                <td>
                                    <ul class="item-list">
                                        @foreach ($item->detail as $detail)
                                            <li>{{ $detail->barang->nama_barang ?? '-' }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div class="text-dark">{{ $item->keperluan }}</div>
                                </td>
                                <td>
                                    <i class="bi bi-calendar-event text-primary me-1"></i>
                                    {{ $item->tanggal_pinjam }}
                                </td>
                                <td>
                                    @if ($item->pengembalian && $item->pengembalian->tanggal_pengembalian)
                                        <i class="bi bi-calendar-check text-success me-1"></i>
                                        {{ $item->pengembalian->tanggal_pengembalian }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge-status badge-{{ $item->status }}">
                                        @if ($item->status == 'dipinjam')
                                            <i class="bi bi-clock-history"></i>
                                            Dipinjam
                                        @else
                                            <i class="bi bi-check-circle"></i>
                                            Dikembalikan
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>
                                        <div class="h5">Tidak Ada Data</div>
                                        <p>Belum ada data peminjaman yang tersedia</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
