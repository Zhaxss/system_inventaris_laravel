<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar Pinjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            --card-shadow-hover: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-header {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
        }

        .page-title {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--card-shadow-hover);
            transform: translateY(-5px);
        }

        .card-header {
            background: var(--primary-gradient);
            color: white;
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            border: none;
        }

        .table-wrapper {
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .table thead th {
            border: none;
            padding: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }

        .badge {
            padding: 0.5rem 1rem;
            font-weight: 500;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .badge.bg-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%) !important;
            color: white !important;
        }

        .badge.bg-success {
            background: var(--success-gradient) !important;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-outline-secondary {
            border-radius: 10px;
            border: 2px solid #6c757d;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            border-radius: 8px;
            border: 2px solid #667eea;
            color: #667eea;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary-gradient);
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-header {
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem;
            border: none;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select,
        textarea {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            box-shadow: var(--card-shadow);
        }

        .alert-success {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            color: #155724;
        }

        .barang-row {
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-success {
            background: var(--success-gradient);
            border: none;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-danger {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            border-radius: 8px;
            font-weight: 600;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e0;
            margin-bottom: 1rem;
        }

        .item-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 0.75rem;
            margin-top: 0.5rem;
        }

        .item-list ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .item-list li {
            padding: 0.25rem 0;
            color: #495057;
        }

        /* Scroll animation */
        .fade-in {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-footer {
            border-top: 1px solid #f0f0f0;
            padding: 1.25rem 2rem;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
    </style>
</head>

<body>
    <div class="container mt-4 fade-in">
        @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                    <div>
                        <strong>Berhasil!</strong> {{ session('sukses') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h2 class="page-title mb-1">
                    <i class="bi bi-box-seam"></i> Daftar Pinjaman
                </h2>
            </div>
            <a href="/dashboard" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-list-ul fs-5 me-2"></i>
                    <span class="fw-semibold">Daftar Pinjam</span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="text-center">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th style="width: 130px;">Tanggal Pinjam</th>
                                <th>Nama Peminjam</th>
                                <th>Daftar Barang</th>
                                <th style="width: 130px;">No. HP</th>
                                <th style="width: 130px;">Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($peminjaman as $no => $data)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-secondary">{{ $no + 1 }}</span>
                                    </td>
                                    <td class="text-center">
                                        <i class="bi bi-calendar3 text-primary me-1"></i>
                                        {{ \Carbon\Carbon::parse($data->tanggal_pinjam)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; font-weight: 600;">
                                                {{ strtoupper(substr($data->nama_peminjam, 0, 1)) }}
                                            </div>
                                            <span class="fw-semibold">{{ $data->nama_peminjam }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="item-list">
                                            <ul class="mb-0">
                                                @foreach ($data->detail as $detail)
                                                    <li>
                                                        <i class="bi bi-box text-primary me-1"></i>
                                                        {{ $detail->barang->nama_barang ?? '-' }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <i class="bi bi-telephone text-success me-1"></i>
                                        {{ $data->telepon }}
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge 
                                            @if ($data->status == 'dipinjam') bg-warning
                                            @elseif ($data->status == 'dikembalikan') bg-success
                                            @else bg-secondary @endif">
                                            <i
                                                class="bi 
                                                @if ($data->status == 'dipinjam') bi-clock-history
                                                @elseif ($data->status == 'dikembalikan') bi-check-circle
                                                @else bi-dash-circle @endif me-1"></i>
                                            {{ ucfirst($data->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="/pengembalian/{{ $data->id }}"
                                            class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <i class="bi bi-inbox"></i>
                                            <h5 class="text-muted">Belum Ada Data</h5>
                                            <p class="text-muted mb-0">Silakan tambah pengembalian baru</p>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('barang-wrapper');
            const addBtn = document.getElementById('addBarang');

            function updateBarangOptions() {
                const allSelects = document.querySelectorAll('.select-barang');
                const selectedValues = Array.from(allSelects)
                    .map(s => s.value)
                    .filter(v => v !== '');

                allSelects.forEach(select => {
                    const options = select.querySelectorAll('option');
                    options.forEach(opt => {
                        if (opt.value && selectedValues.includes(opt.value) && opt.value !== select
                            .value) {
                            opt.disabled = true;
                        } else {
                            opt.disabled = false;
                        }
                    });
                });
            }

            addBtn.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.classList.add('row', 'mb-2', 'barang-row');
                newRow.innerHTML = `
                <div class="col-md-10">
                    <select class="form-select select-barang" name="id_barang[]" required>
                        <option value="" disabled selected>-- Pilih Barang --</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="button" class="btn btn-danger btn-remove">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `;
                wrapper.appendChild(newRow);
                updateBarangOptions();
            });

            wrapper.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-remove') || e.target.closest('.btn-remove')) {
                    e.target.closest('.barang-row').remove();
                    updateBarangOptions();
                }
            });

            wrapper.addEventListener('change', function(e) {
                if (e.target.classList.contains('select-barang')) {
                    updateBarangOptions();
                }
            });

            updateBarangOptions();
        });
    </script>
</body>

</html>
