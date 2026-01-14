<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<title>Halaman Detail Pengembalian</title>

<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1 fw-bold">Detail Peminjaman</h2>
            <p class="text-muted mb-0">Informasi lengkap peminjaman barang</p>
        </div>
        @if (Auth::user()->status === 'petugas')
            <a href="/daftar_pinjam" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        @else
            <a href="/pengembalian" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        @endif

    </div>

    <div class="row">
        <!-- Main Information Card -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>Informasi Peminjaman
                    </h5>
                </div>

                <div class="card-body p-4">
                    <!-- STATUS & TANGGAL PINJAM -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                <i class="bi bi-calendar-event fs-3 text-primary me-3"></i>
                                <div>
                                    <label class="text-muted small mb-1 d-block">Tanggal Pinjam</label>
                                    <p class="fw-bold mb-0">
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                <i class="bi bi-patch-check fs-3 text-success me-3"></i>
                                <div>
                                    <label class="text-muted small mb-1 d-block">Status Peminjaman</label>
                                    @if ($peminjaman->status == 'dipinjam')
                                        <span class="badge bg-warning text-dark px-3 py-2">
                                            <i class="bi bi-clock-history me-1"></i>Dipinjam
                                        </span>
                                    @elseif ($peminjaman->status == 'dikembalikan')
                                        <span class="badge bg-success px-3 py-2">
                                            <i class="bi bi-check-circle me-1"></i>Dikembalikan
                                        </span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">
                                            {{ ucfirst($peminjaman->status) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- DAFTAR BARANG DIPINJAM -->
                    <h6 class="text-muted mb-3 fw-semibold">
                        <i class="bi bi-box-seam me-2"></i>Daftar Barang yang Dipinjam
                    </h6>
                    <div class="card border-0 bg-light mb-4">
                        <div class="card-body">
                            @if ($peminjaman->detail->isNotEmpty())
                                <div class="list-group list-group-flush">
                                    @foreach ($peminjaman->detail as $index => $detail)
                                        <div class="list-group-item bg-transparent border-0 px-0 py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-primary rounded-circle me-3"
                                                        style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">
                                                        {{ $index + 1 }}
                                                    </span>
                                                    <span class="fw-semibold">
                                                        {{ $detail->barang->nama_barang ?? 'Barang tidak ditemukan' }}
                                                    </span>
                                                </div>
                                                <span class="badge bg-info text-dark px-3 py-2">
                                                    Jumlah: {{ $detail->jumlah_pinjam }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0 text-center fst-italic py-3">
                                    <i class="bi bi-inbox me-2"></i>Tidak ada barang yang tercatat
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- DATA PEMINJAM -->
                    <h6 class="text-muted mb-3 fw-semibold">
                        <i class="bi bi-person me-2"></i>Data Peminjam
                    </h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="card border-0 bg-light h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-person-circle fs-4 text-primary me-3 mt-1"></i>
                                        <div class="flex-grow-1">
                                            <label class="text-muted small mb-1 d-block">Nama Peminjam</label>
                                            <p class="fw-semibold mb-0">{{ $peminjaman->nama_peminjam }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-0 bg-light h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-telephone fs-4 text-success me-3 mt-1"></i>
                                        <div class="flex-grow-1">
                                            <label class="text-muted small mb-1 d-block">Telepon</label>
                                            <p class="fw-semibold mb-0">{{ $peminjaman->telepon }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-geo-alt fs-4 text-danger me-3 mt-1"></i>
                                        <div class="flex-grow-1">
                                            <label class="text-muted small mb-1 d-block">Alamat</label>
                                            <p class="fw-semibold mb-0">{{ $peminjaman->alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KEPERLUAN -->
                    <h6 class="text-muted mb-3 fw-semibold">
                        <i class="bi bi-clipboard-check me-2"></i>Keperluan Peminjaman
                    </h6>
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <p class="mb-0 text-secondary">{{ $peminjaman->keperluan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-gradient text-white"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history me-2"></i>Timeline Peminjaman
                    </h5>
                </div>
                <div class="card-body p-4">
                    @php
                        // Set timezone ke WIB (Asia/Jakarta)
                        $timezone = 'Asia/Jakarta';

                        // Parse tanggal dengan timezone WIB
                        $borrowDate = \Carbon\Carbon::parse($peminjaman->tanggal_pinjam, $timezone);
                        $returnDate = \Carbon\Carbon::parse($peminjaman->tanggal_kembali, $timezone);
                        $now = \Carbon\Carbon::now($timezone);

                        // Set waktu tanggal kembali sama dengan waktu peminjaman
                        $returnDate->setTime($borrowDate->hour, $borrowDate->minute, $borrowDate->second);
                    @endphp

                    <!-- Tanggal Pinjam -->
                    <div class="timeline-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="timeline-icon bg-primary rounded-circle p-2 me-3 shadow-sm">
                                <i class="bi bi-calendar-plus text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1 fw-semibold">Tanggal Pinjam</label>
                                <p class="fw-bold mb-1">{{ $borrowDate->translatedFormat('d F Y') }}</p>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>{{ $borrowDate->format('H:i') }} WIB
                                </small>
                                <br>
                                <small class="text-primary">{{ $borrowDate->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-connector ms-3 mb-3"></div>

                    <!-- Tanggal Kembali -->
                    <div class="timeline-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="timeline-icon bg-info rounded-circle p-2 me-3 shadow-sm">
                                <i class="bi bi-calendar-check text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1 fw-semibold">Batas Pengembalian</label>
                                <p class="fw-bold mb-1">{{ $returnDate->translatedFormat('d F Y') }}</p>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>{{ $returnDate->format('H:i') }} WIB
                                </small>
                                <br>
                                <small class="text-info">{{ $returnDate->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>

                    @php
                        // Hitung selisih waktu
                        $diff = $now->diff($returnDate);
                        $isLate = $now->greaterThan($returnDate);

                        // Format waktu detail
                        $days = $diff->days;
                        $hours = $diff->h;
                        $minutes = $diff->i;

                        // Build time string
                        $timeString = '';
                        if ($days > 0) {
                            $timeString .= $days . ' hari ';
                        }
                        if ($hours > 0) {
                            $timeString .= $hours . ' jam ';
                        }
                        if ($minutes > 0 && $days == 0) {
                            $timeString .= $minutes . ' menit';
                        }
                        $timeString = trim($timeString);
                    @endphp

                    <hr class="my-4">

                    @if ($peminjaman->status == 'dipinjam')
                        <!-- Waktu Sekarang -->
                        <div class="text-center mb-3 p-3 rounded shadow-sm"
                            style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
                            <small class="text-muted d-block mb-1 fw-semibold">
                                <i class="bi bi-clock-fill me-1"></i>Waktu Sekarang
                            </small>
                            <strong class="text-primary fs-6">{{ $now->translatedFormat('d F Y') }}
                                {{ $now->format('H:i') }} WIB</strong>
                        </div>

                        <!-- Alert Status -->
                        <div
                            class="alert alert-{{ $isLate ? 'danger' : ($days <= 3 ? 'warning' : 'info') }} border-0 shadow-sm mb-0">
                            <div class="d-flex align-items-start">
                                @if ($isLate)
                                    <i class="bi bi-exclamation-triangle-fill fs-3 me-3"></i>
                                    <div>
                                        <strong class="d-block mb-1">Terlambat!</strong>
                                        <small>Sudah melewati batas waktu {{ $timeString }}</small>
                                    </div>
                                @elseif($days == 0 && $hours == 0)
                                    <i class="bi bi-bell-fill fs-3 me-3"></i>
                                    <div>
                                        <strong class="d-block mb-1">Segera Jatuh Tempo!</strong>
                                        <small>Hanya tersisa {{ $timeString }}</small>
                                    </div>
                                @elseif($days == 0)
                                    <i class="bi bi-clock-fill fs-3 me-3"></i>
                                    <div>
                                        <strong class="d-block mb-1">Jatuh Tempo Hari Ini!</strong>
                                        <small>Sisa waktu {{ $timeString }}</small>
                                    </div>
                                @elseif($days == 1)
                                    <i class="bi bi-clock-fill fs-3 me-3"></i>
                                    <div>
                                        <strong class="d-block mb-1">Besok Jatuh Tempo!</strong>
                                        <small>Sisa waktu {{ $timeString }}</small>
                                    </div>
                                @else
                                    <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                                    <div>
                                        <strong class="d-block mb-1">Sisa Waktu Peminjaman</strong>
                                        <small>{{ $timeString }} lagi hingga batas pengembalian</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <!-- Status Dikembalikan -->
                        @php
                            $returnedDate = \Carbon\Carbon::parse($peminjaman->updated_at, $timezone);
                        @endphp
                        <div class="alert alert-success border-0 shadow-sm mb-0">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-check-circle-fill fs-3 me-3"></i>
                                <div>
                                    <strong class="d-block mb-1">Barang Sudah Dikembalikan</strong>
                                    <small>{{ $returnedDate->translatedFormat('d F Y') }}</small>
                                    <br>
                                    <small>{{ $returnedDate->format('H:i') }} WIB</small>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Timeline Styles */
    .timeline-connector {
        width: 3px;
        height: 30px;
        background: linear-gradient(to bottom, #0d6efd, #0dcaf0);
        margin-left: 18.5px;
        border-radius: 10px;
    }

    .timeline-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    /* Card Hover Effects */
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important;
    }

    /* Background Colors */
    .bg-light {
        background-color: #f8f9fa !important;
    }

    /* List Item Hover */
    .list-group-item {
        transition: all 0.2s ease;
    }

    .list-group-item:hover {
        background-color: rgba(13, 110, 253, 0.05) !important;
        padding-left: 0.5rem !important;
    }

    /* Alert Styling */
    .alert {
        border-radius: 12px;
        border: none;
    }

    .alert strong {
        font-size: 0.95rem;
    }

    /* Badge Styling */
    .badge {
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    /* Smooth Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-body>* {
        animation: fadeIn 0.5s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .timeline-icon {
            width: 35px;
            height: 35px;
        }

        .timeline-connector {
            margin-left: 16.5px;
        }
    }
</style>
