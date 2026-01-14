<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Manajemen Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f5f7fa;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-bottom: 3rem;
        }

        .main-container {
            padding: 2rem 0;
        }

        /* Alert Styling */
        .alert-success {
            background: white;
            border: none;
            border-left: 4px solid #10b981;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            color: #065f46;
        }

        .alert-success i {
            color: #10b981;
        }

        /* Page Header */
        .page-header {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .page-header h2 {
            color: #2d3748;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.75rem;
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

        /* Action Bar */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 0.65rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .btn-back {
            background: white;
            color: #4a5568;
            border: 2px solid #e2e8f0;
        }

        .btn-back:hover {
            background: #f7fafc;
            border-color: #cbd5e0;
            transform: translateY(-2px);
        }

        .btn-add {
            background: #0f67c5;
            color: white;
        }

        .btn-add:hover {
            background: #0346a3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        /* Card Styling */
        .card-custom {
            background: white;
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header-custom {
            background: #4a5568;
            color: white;
            padding: 1.25rem 1.5rem;
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-body-custom {
            padding: 1.5rem;
        }

        /* Table Styling */
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        .table-custom {
            margin: 0;
        }

        .table-custom thead th {
            background: #f7fafc;
            color: #2d3748;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem;
            border: none;
            vertical-align: middle;
        }

        .table-custom tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-custom tbody tr:hover {
            background-color: #f7fafc;
            transform: scale(1.005);
        }

        .table-custom tbody td {
            padding: 1rem;
            vertical-align: middle;
            color: #4a5568;
        }

        .table-custom tbody td.fw-semibold {
            color: #2d3748;
            font-weight: 600;
        }

        /* Image Styling */
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.5);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        /* Button Actions */
        .btn-edit {
            background: #fbbf24;
            color: #78350f;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(251, 191, 36, 0.3);
        }

        .btn-archive {
            background: #e53e3e;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-archive:hover {
            background: #c53030;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(229, 62, 62, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #a0aec0;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state p {
            font-size: 1.1rem;
            margin: 0;
        }

        /* Archive Link */
        .archive-link {
            background: #fef3c7;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-top: 1.5rem;
            border-left: 4px solid #fbbf24;
        }

        .archive-link a {
            color: #78350f;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .archive-link a:hover {
            color: #92400e;
            text-decoration: underline;
        }

        /* Modal Styling */
        .modal-content {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            border-bottom: 2px solid #e2e8f0;
            padding: 1.5rem;
            border-radius: 15px 15px 0 0;
        }

        .modal-header.bg-primary {
            background: #4a5568 !important;
        }

        .modal-header.bg-warning {
            background: #fbbf24 !important;
            color: #78350f !important;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.65rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4a5568;
            box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
        }

        /* Preview Image */
        .preview-image {
            max-width: 150px;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            padding: 0.5rem;
            background: #f7fafc;
        }

        .img-thumbnail {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.25rem;
        }

        /* Badge Styling */
        .badge-custom {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        /* Animasi fade-in untuk baris tabel */
        .fade-in-row {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInRow 0.4s ease forwards;
        }

        @keyframes fadeInRow {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced Pagination Styling */
        .pagination-wrapper {
            margin-top: 2rem;
            padding: 1rem;
        }

        .pagination-wrapper nav ul {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .pagination-wrapper nav ul li {
            list-style: none;
        }

        .pagination-wrapper nav ul li a,
        .pagination-wrapper nav ul li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 45px;
            height: 45px;
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            border: 2px solid #e2e8f0;
            background: white;
            color: #4a5568;
            position: relative;
            overflow: hidden;
        }

        /* Hover Effect dengan Wave Animation */
        .pagination-wrapper nav ul li a::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(79, 70, 229, 0.1);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .pagination-wrapper nav ul li a:hover::before {
            width: 200%;
            height: 200%;
        }

        .pagination-wrapper nav ul li a:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white !important;
            border-color: #667eea;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        /* Active Page Styling */
        .pagination-wrapper nav ul li span.current,
        .pagination-wrapper nav ul li .active {
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            color: white !important;
            border-color: #4a5568;
            box-shadow: 0 4px 15px rgba(74, 85, 104, 0.3);
            font-weight: 700;
            transform: scale(1.1);
        }

        /* Disabled State */
        .pagination-wrapper nav ul li .disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Previous/Next Button Styling */
        .pagination-wrapper nav ul li:first-child a,
        .pagination-wrapper nav ul li:last-child a {
            font-weight: 700;
            padding: 8px 16px;
        }

        .pagination-wrapper nav ul li:first-child a:hover,
        .pagination-wrapper nav ul li:last-child a:hover {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-color: #10b981;
        }

        /* Pulse Animation untuk Active Page */
        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 4px 15px rgba(74, 85, 104, 0.3);
            }

            50% {
                box-shadow: 0 4px 25px rgba(74, 85, 104, 0.5);
            }
        }

        .pagination-wrapper nav ul li span.current {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Ripple Animation */
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Fade In Up Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem;
            }

            .page-header h2 {
                font-size: 1.5rem;
            }

            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-custom {
                width: 100%;
                justify-content: center;
            }

            .product-image {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-width: 576px) {

            .pagination-wrapper nav ul li a,
            .pagination-wrapper nav ul li span {
                min-width: 38px;
                height: 38px;
                font-size: 0.85rem;
                padding: 6px 10px;
            }

            .pagination-wrapper nav ul {
                gap: 0.3rem;
            }
        }
    </style>
</head>

<body>

    <div class="main-container">
        <div class="container">
            {{-- Alert sukses --}}
            @if (session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Page Header -->
            <div class="page-header">
                <h2>
                    <div class="icon-wrapper">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    Manajemen Barang
                </h2>
            </div>

            <!-- Action Bar -->
            <div class="action-bar">
                <a href="/dashboard" class="btn-custom btn-back">
                    <i class="bi bi-arrow-left-circle"></i>
                    Kembali
                </a>
                <button type="button" class="btn-custom btn-add" data-bs-toggle="modal"
                    data-bs-target="#modalTambahBarang">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Barang
                </button>
            </div>

            <div class="archive-link mb-2">
                <i class="bi bi-info-circle me-2"></i>
                Untuk melihat barang yang diarsipkan, silakan
                <a href="/barang/arsip">klik di sini</a>.
            </div>

            <!-- Table Card -->
            <div class="card-custom">
                <div class="card-header-custom">
                    <i class="bi bi-table me-1"></i>
                    Data Barang Inventaris
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">No</th>
                                    <th>Nama Barang</th>
                                    <th style="width: 100px;">Jumlah</th>
                                    <th style="width: 150px;">Tipe</th>
                                    <th style="width: 120px;">Gambar</th>
                                    <th style="width: 200px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                @forelse($manajemen_barang as $no => $data)
                                    <tr class="fade-in-row">
                                        <td class="text-center fw-bold">{{ $manajemen_barang->firstItem() + $no }}</td>
                                        <td class="fw-semibold">{{ $data->nama_barang }}</td>
                                        <td class="text-center">
                                            <span class="badge-custom bg-light text-dark">{{ $data->jumlah }}</span>
                                        </td>
                                        <td>{{ $data->tipe }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('uploads/' . $data->gambar) }}" class="product-image"
                                                alt="{{ $data->nama_barang }}">
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button type="button" class="btn-edit" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditBarang{{ $data->id }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>

                                                <form action="{{ route('barang.hapus', $data->id) }}" method="post"
                                                    class="d-inline-block"
                                                    onsubmit="return confirm('Apakah anda yakin ingin mengarsipkan barang ini?')">
                                                    @csrf
                                                    <button class="btn-archive">
                                                        <i class="bi bi-archive"></i> Arsip
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="empty-state">
                                                <i class="bi bi-inbox"></i>
                                                <p>Belum ada data barang</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($manajemen_barang->hasPages())
                        <div class="d-flex justify-content-end mt-3">
                            {{ $manajemen_barang->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Barang -->
    <div class="modal fade" id="modalTambahBarang" tabindex="-1" aria-labelledby="modalTambahBarangLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalTambahBarangLabel">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Barang Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/manajemen_submit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">
                                <i class="bi bi-box me-1"></i>Nama Barang
                            </label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                placeholder="Masukkan nama barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">
                                <i class="bi bi-hash me-1"></i>Jumlah
                            </label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" min="1"
                                placeholder="Masukkan jumlah" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">
                                <i class="bi bi-tag me-1"></i>Tipe Barang
                            </label>
                            <input type="text" class="form-control" name="tipe" id="tipe"
                                placeholder="Masukkan tipe barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">
                                <i class="bi bi-image me-1"></i>Upload Gambar
                            </label>
                            <input type="file" class="form-control" name="gambar" id="gambar"
                                accept="image/*" required>
                            <img id="preview" src="#" alt="Preview Gambar" class="preview-image mt-3"
                                style="display:none;">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i>Batal
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-1"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Barang --}}
    @foreach ($manajemen_barang as $data)
        <div class="modal fade" id="modalEditBarang{{ $data->id }}" tabindex="-1"
            aria-labelledby="modalEditBarangLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalEditBarangLabel{{ $data->id }}">
                            <i class="bi bi-pencil-square me-2"></i>Edit Barang: {{ $data->nama_barang }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/manajemen_barang/edit/submit/{{ $data->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="bi bi-box me-1"></i>Nama Barang
                                </label>
                                <input type="text" class="form-control" name="nama_barang"
                                    value="{{ $data->nama_barang }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="bi bi-hash me-1"></i>Jumlah
                                </label>
                                <input type="number" class="form-control" name="jumlah"
                                    value="{{ $data->jumlah }}" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="bi bi-tag me-1"></i>Tipe Barang
                                </label>
                                <input type="text" class="form-control" name="tipe"
                                    value="{{ $data->tipe }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="bi bi-image me-1"></i>Gambar Saat Ini
                                </label><br>
                                <img src="{{ asset('uploads/' . $data->gambar) }}" alt="gambar barang"
                                    class="img-thumbnail mb-3" style="max-width: 150px;">
                                <input type="file" class="form-control" name="gambar" accept="image/*">
                                <small class="text-muted d-block mt-2">
                                    <i class="bi bi-info-circle me-1"></i>Kosongkan jika tidak ingin mengganti gambar.
                                </small>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle me-1"></i>Batal
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle me-1"></i>Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        // Preview gambar di modal tambah
        document.getElementById('gambar').addEventListener('change', function(event) {
            const [file] = this.files;
            if (file) {
                const preview = document.getElementById('preview');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });

        // Enhanced Pagination Interactivity
        document.addEventListener('DOMContentLoaded', function() {
            const paginationLinks = document.querySelectorAll('.pagination-wrapper nav ul li a');

            // Add ripple effect on click
            paginationLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (this.classList.contains('disabled')) return;

                    // Create ripple element
                    const ripple = document.createElement('span');
                    ripple.style.position = 'absolute';
                    ripple.style.width = '20px';
                    ripple.style.height = '20px';
                    ripple.style.background = 'rgba(255, 255, 255, 0.6)';
                    ripple.style.borderRadius = '50%';
                    ripple.style.transform = 'scale(0)';
                    ripple.style.animation = 'ripple 0.6s ease-out';
                    ripple.style.pointerEvents = 'none';

                    const rect = this.getBoundingClientRect();
                    ripple.style.left = (e.clientX - rect.left - 10) + 'px';
                    ripple.style.top = (e.clientY - rect.top - 10) + 'px';

                    this.appendChild(ripple);

                    setTimeout(() => ripple.remove(), 600);

                    // Add loading state
                    const tableContent = document.getElementById('table-content');
                    if (tableContent) {
                        tableContent.style.opacity = '0.5';
                        tableContent.style.transition = 'opacity 0.3s ease';
                    }

                    // Simulate page change (replace with actual navigation)
                    setTimeout(() => {
                        tableContent.style.opacity = '1';
                    }, 500);
                });

                // Add keyboard navigation
                link.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter' && !this.classList.contains('disabled')) {
                        this.click();
                    }
                });
            });

            // Smooth scroll to table after pagination click
            paginationLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!this.classList.contains('disabled')) {
                        setTimeout(() => {
                            const tableCard = document.querySelector('.card-custom');
                            if (tableCard) {
                                tableCard.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            }
                        }, 100);
                    }
                });
            });

            // Add number indicators animation
            const pageNumbers = document.querySelectorAll('.pagination-wrapper nav ul li');
            pageNumbers.forEach((item, index) => {
                item.style.animation = `fadeInUp 0.4s ease ${index * 0.05}s both`;
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('sukses'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('sukses') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Duplikat Data!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif


</body>

</html>
