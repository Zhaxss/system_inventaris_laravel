<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang Arsip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #5a6c7d;
            --secondary-color: #8b9ba8;
            --success-color: #52a96f;
            --danger-color: #d9707c;
            --info-color: #6b9ec7;
            --light-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --border-color: #e2e8f0;
            --hover-bg: #f7fafc;
        }

        body {
            background: linear-gradient(to bottom, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-primary);
        }

        .main-container {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 1400px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--border-color);
        }

        /* Alert Styles */
        .alert-custom {
            border: none;
            border-radius: 8px;
            padding: 1rem 1.25rem;
            border-left: 4px solid;
            animation: slideInDown 0.4s ease-out;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        .alert-success-custom {
            background: #f0f9f4;
            color: #2d6f4a;
            border-left-color: var(--success-color);
        }

        .alert-info-custom {
            background: #f0f7fc;
            color: #2c5282;
            border-left-color: var(--info-color);
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Button Styles */
        .btn-custom {
            border-radius: 6px;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            font-size: 0.9rem;
        }

        .btn-back {
            background: var(--card-bg);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .btn-back:hover {
            background: var(--hover-bg);
            border-color: var(--secondary-color);
            color: var(--primary-color);
        }

        .btn-restore {
            background: var(--success-color);
            color: white;
        }

        .btn-restore:hover {
            background: #458a5e;
            box-shadow: 0 2px 4px rgba(82, 169, 111, 0.2);
        }

        .btn-delete {
            background: var(--danger-color);
            color: white;
        }

        .btn-delete:hover {
            background: #c05a66;
            box-shadow: 0 2px 4px rgba(217, 112, 124, 0.2);
        }

        /* Card Styles */
        .card-custom {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            background: var(--card-bg);
        }

        .card-header-custom {
            background: var(--primary-color);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Table Styles */
        .table-custom {
            margin-bottom: 0;
        }

        .table-custom thead th {
            background: #fafbfc;
            color: var(--text-primary);
            font-weight: 600;
            border-bottom: 2px solid var(--border-color);
            padding: 0.875rem 1rem;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .table-custom tbody tr {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #f1f3f5;
        }

        .table-custom tbody tr:hover {
            background: var(--hover-bg);
        }

        .table-custom tbody td {
            padding: 1rem;
            vertical-align: middle;
            color: var(--text-primary);
        }

        /* Image Styles */
        .img-product {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid var(--border-color);
            transition: transform 0.2s ease;
        }

        .img-product:hover {
            transform: scale(1.6);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 10;
            cursor: pointer;
        }

        /* Badge Styles */
        .badge-custom {
            padding: 0.35rem 0.75rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .badge-quantity {
            background: #e8edf2;
            color: var(--text-primary);
        }

        .badge-type {
            background: #e3f2fd;
            color: #2962a8;
        }

        /* Empty State */
        .empty-state {
            padding: 3rem 1rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            opacity: 0.4;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                margin: 1rem;
                padding: 1.25rem;
                border-radius: 8px;
            }

            .card-header-custom {
                font-size: 0.95rem;
                padding: 0.875rem 1rem;
            }

            .table-custom {
                font-size: 0.85rem;
            }

            .table-custom thead th,
            .table-custom tbody td {
                padding: 0.75rem 0.5rem;
            }

            .btn-custom {
                padding: 0.4rem 0.75rem;
                font-size: 0.85rem;
            }

            .img-product {
                width: 50px;
                height: 50px;
            }

            .action-buttons {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .action-buttons .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .hide-mobile {
                display: none;
            }
        }

        /* Smooth transitions */
        .btn-custom:active {
            transform: scale(0.98);
        }

        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f8f9fa;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }

        /* Pagination styling */
        .pagination {
            margin-top: 0;
        }

        .page-link {
            color: var(--primary-color);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            margin: 0 2px;
            padding: 0.5rem 0.75rem;
        }

        .page-link:hover {
            background: var(--hover-bg);
            color: var(--primary-color);
            border-color: var(--secondary-color);
        }

        .page-item.active .page-link {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-item.disabled .page-link {
            color: var(--text-secondary);
            background: var(--light-bg);
        }

        /* Icon styling */
        .alert-custom i {
            opacity: 0.8;
        }

        /* Text utilities */
        .text-soft {
            color: var(--text-secondary);
        }

        /* Card footer */
        .card-footer-custom {
            background: #fafbfc;
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        /* Custom Modal/Dialog Styles */
        .custom-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.2s ease-out;
        }

        .custom-modal.show {
            display: flex;
        }

        .modal-content-custom {
            background: white;
            border-radius: 12px;
            padding: 0;
            max-width: 450px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.3s ease-out;
            overflow: hidden;
        }

        .modal-header-custom {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .modal-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .modal-icon.warning {
            background: #fff3cd;
            color: #856404;
        }

        .modal-icon.danger {
            background: #f8d7da;
            color: #842029;
        }

        .modal-title-custom {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .modal-body-custom {
            padding: 1.5rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .modal-footer-custom {
            padding: 1rem 1.5rem;
            background: var(--hover-bg);
            display: flex;
            gap: 0.75rem;
            justify-content: flex-end;
        }

        .modal-btn {
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }

        .modal-btn-cancel {
            background: white;
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .modal-btn-cancel:hover {
            background: var(--hover-bg);
        }

        .modal-btn-confirm {
            background: var(--danger-color);
            color: white;
        }

        .modal-btn-confirm:hover {
            background: #c05a66;
        }

        .modal-btn-restore {
            background: var(--success-color);
            color: white;
        }

        .modal-btn-restore:hover {
            background: #458a5e;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Loading state */
        .btn-loading {
            position: relative;
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-loading::after {
            content: "";
            position: absolute;
            width: 14px;
            height: 14px;
            top: 50%;
            left: 50%;
            margin-left: -7px;
            margin-top: -7px;
            border: 2px solid transparent;
            border-top-color: currentColor;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>

<div class="main-container">
    {{-- Alert sukses --}}
    @if (session('sukses'))
        <div class="alert alert-success-custom alert-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-3" style="font-size: 1.25rem;"></i>
                <div class="flex-grow-1">
                    <strong>Berhasil!</strong>
                    <span class="ms-2">{{ session('sukses') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Tombol kembali -->
    <div class="mb-3">
        <a href="/manajemen_barang" class="btn btn-back btn-custom">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Utama
        </a>
    </div>

    <!-- Keterangan -->
    <div class="alert alert-info-custom alert-custom mb-4">
        <div class="d-flex align-items-start">
            <i class="bi bi-info-circle-fill me-3 mt-1" style="font-size: 1.25rem;"></i>
            <div>
                <strong class="d-block mb-1">Informasi Arsip</strong>
                <p class="mb-0 small">Data yang diarsipkan tidak terlihat di daftar utama. Anda dapat mengembalikannya dengan klik tombol <strong>Kembalikan</strong>, atau menghapusnya secara permanen.</p>
            </div>
        </div>
    </div>

    <!-- Tabel Data Barang -->
    <div class="card card-custom">
        <div class="card-header-custom">
            <i class="bi bi-archive me-2"></i>Data Barang yang Diarsipkan
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama Barang</th>
                            <th class="hide-mobile" style="width: 110px;">Jumlah</th>
                            <th class="hide-mobile" style="width: 130px;">Tipe</th>
                            <th style="width: 100px;">Gambar</th>
                            <th class="text-center" style="width: 240px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barang as $no => $data)
                            <tr>
                                <td class="text-soft">{{ $no + 1 }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $data->nama_barang }}</div>
                                    <small class="text-soft d-md-none">
                                        {{ $data->jumlah }} unit • {{ $data->tipe }}
                                    </small>
                                </td>
                                <td class="hide-mobile">
                                    <span class="badge-custom badge-quantity">{{ $data->jumlah }} unit</span>
                                </td>
                                <td class="hide-mobile">
                                    <span class="badge-custom badge-type">{{ $data->tipe }}</span>
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/' . $data->gambar) }}"
                                         alt="{{ $data->nama_barang }}"
                                         class="img-product"
                                         title="{{ $data->nama_barang }}">
                                </td>
                                <td>
                                    <div class="action-buttons d-flex justify-content-center gap-2">
                                        <form action="{{ route('barang.restore', $data->id) }}" method="post" class="d-inline form-restore" data-name="{{ $data->nama_barang }}">
                                            @csrf
                                            <button class="btn btn-sm btn-restore btn-custom" type="button" onclick="showRestoreModal(this)">
                                                <i class="bi bi-arrow-counterclockwise me-1"></i>Kembalikan
                                            </button>
                                        </form>

                                        <form action="{{ route('barang.hapus', $data->id) }}" method="post" class="d-inline form-delete" data-name="{{ $data->nama_barang }}">
                                            @csrf
                                            <input type="hidden" name="force" value="1">
                                            <button class="btn btn-sm btn-delete btn-custom" type="button" onclick="showDeleteModal(this)">
                                                <i class="bi bi-trash3 me-1"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-state text-center">
                                    <i class="bi bi-inbox"></i>
                                    <p class="mb-0 fw-semibold">Tidak ada barang yang diarsipkan</p>
                                    <small class="text-soft">Semua barang Anda masih aktif</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if(!$barang->isEmpty())
        <div class="card-footer-custom">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <small class="text-soft mb-2 mb-md-0">
                    <i class="bi bi-folder2-open me-1"></i>Menampilkan data arsip barang
                </small>
                <div>
                    {!! $barang->links() !!}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Custom Modal for Delete Confirmation -->
<div class="custom-modal" id="deleteModal">
    <div class="modal-content-custom">
        <div class="modal-header-custom">
            <div class="modal-icon danger">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <div>
                <h5 class="modal-title-custom">Hapus Permanen</h5>
            </div>
        </div>
        <div class="modal-body-custom">
            <p class="mb-2"><strong>PERHATIAN:</strong> Anda akan menghapus barang <strong id="deleteName"></strong></p>
            <p class="mb-0 text-danger">Data akan dihapus permanen dan tidak dapat dikembalikan!</p>
        </div>
        <div class="modal-footer-custom">
            <button type="button" class="modal-btn modal-btn-cancel" onclick="closeModal('deleteModal')">
                <i class="bi bi-x-circle me-1"></i>Batal
            </button>
            <button type="button" class="modal-btn modal-btn-confirm" onclick="confirmDelete()">
                <i class="bi bi-trash3 me-1"></i>Ya, Hapus Permanen
            </button>
        </div>
    </div>
</div>

<!-- Custom Modal for Restore Confirmation -->
<div class="custom-modal" id="restoreModal">
    <div class="modal-content-custom">
        <div class="modal-header-custom">
            <div class="modal-icon warning">
                <i class="bi bi-arrow-counterclockwise"></i>
            </div>
            <div>
                <h5 class="modal-title-custom">Kembalikan Barang</h5>
            </div>
        </div>
        <div class="modal-body-custom">
            <p class="mb-0">Apakah Anda yakin ingin mengembalikan <strong id="restoreName"></strong> ke daftar utama?</p>
        </div>
        <div class="modal-footer-custom">
            <button type="button" class="modal-btn modal-btn-cancel" onclick="closeModal('restoreModal')">
                <i class="bi bi-x-circle me-1"></i>Batal
            </button>
            <button type="button" class="modal-btn modal-btn-restore" onclick="confirmRestore()">
                <i class="bi bi-check-circle me-1"></i>Ya, Kembalikan
            </button>
        </div>
    </div>
</div>

<script>
    let currentForm = null;

    // Show delete modal
    function showDeleteModal(button) {
        currentForm = button.closest('form');
        const itemName = currentForm.getAttribute('data-name');
        document.getElementById('deleteName').textContent = itemName;
        document.getElementById('deleteModal').classList.add('show');
    }

    // Show restore modal
    function showRestoreModal(button) {
        currentForm = button.closest('form');
        const itemName = currentForm.getAttribute('data-name');
        document.getElementById('restoreName').textContent = itemName;
        document.getElementById('restoreModal').classList.add('show');
    }

    // Close modal
    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('show');
        currentForm = null;
    }

    // Confirm delete
    function confirmDelete() {
        if (currentForm) {
            const btn = currentForm.querySelector('button[type="button"]');
            btn.classList.add('btn-loading');
            btn.innerHTML = '<span style="opacity: 0;">Menghapus...</span>';
            
            setTimeout(() => {
                currentForm.submit();
            }, 300);
        }
    }

    // Confirm restore
    function confirmRestore() {
        if (currentForm) {
            const btn = currentForm.querySelector('button[type="button"]');
            btn.classList.add('btn-loading');
            btn.innerHTML = '<span style="opacity: 0;">Memproses...</span>';
            
            setTimeout(() => {
                currentForm.submit();
            }, 300);
        }
    }

    // Close modal when clicking outside
    document.querySelectorAll('.custom-modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('deleteModal');
            closeModal('restoreModal');
        }
    });

    // Auto-hide alert after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert-dismissible');
        alerts.forEach(alert => {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });
    });

    // Smooth fade out animation for alerts
    document.querySelectorAll('.btn-close').forEach(btn => {
        btn.addEventListener('click', function() {
            const alert = this.closest('.alert');
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 200);
        });
    });
</script>

</body>
</html>