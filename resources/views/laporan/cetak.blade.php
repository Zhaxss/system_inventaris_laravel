<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11px;
            padding: 25px;
            background: #ffffff;
            color: #2d3748;
            line-height: 1.5;
        }

        .header-section {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #5a6c7d;
        }

        .company-name {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .company-address {
            font-size: 10px;
            color: #718096;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .report-title {
            font-size: 16px;
            font-weight: 700;
            color: #5a6c7d;
            margin-top: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .report-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 12px 15px;
            background: #f8f9fa;
            border-radius: 6px;
            border-left: 3px solid #5a6c7d;
        }

        .info-item {
            font-size: 10px;
        }

        .info-label {
            font-weight: 600;
            color: #5a6c7d;
            margin-right: 5px;
        }

        .info-value {
            color: #2d3748;
            font-weight: 500;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            border: 1px solid #e2e8f0;
        }

        thead {
            background: #5a6c7d;
            color: white;
        }

        th {
            padding: 10px 8px;
            text-align: left;
            font-weight: 600;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border: none;
        }

        th:first-child {
            text-align: center;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
        }

        tbody tr:nth-child(even) {
            background: #fafbfc;
        }

        tbody tr:last-child {
            border-bottom: 2px solid #5a6c7d;
        }

        td {
            padding: 8px;
            font-size: 10px;
            color: #2d3748;
            vertical-align: top;
        }

        td:first-child {
            text-align: center;
            font-weight: 600;
            color: #718096;
            width: 35px;
        }

        .nama-peminjam {
            font-weight: 600;
            color: #2d3748;
        }

        .item-list {
            margin: 0;
            padding-left: 0;
            list-style: none;
        }

        .item-list li {
            padding: 3px 0;
            position: relative;
            padding-left: 12px;
            line-height: 1.4;
        }

        .item-list li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #5a6c7d;
            font-weight: bold;
        }

        .keperluan-text {
            color: #4a5568;
            line-height: 1.5;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .status-dipinjam {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffc107;
        }

        .status-dikembalikan {
            background: #d4edda;
            color: #155724;
            border: 1px solid #28a745;
        }

        .footer-section {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }

        .signature-area {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .signature-box {
            text-align: center;
            width: 180px;
        }

        .signature-label {
            font-size: 10px;
            font-weight: 600;
            color: #5a6c7d;
            margin-bottom: 50px;
        }

        .signature-name {
            font-size: 10px;
            font-weight: 600;
            color: #2d3748;
            border-top: 1px solid #2d3748;
            padding-top: 5px;
            display: inline-block;
            min-width: 140px;
        }

        .total-summary {
            text-align: right;
            margin-top: 15px;
            padding: 10px 15px;
            background: #f8f9fa;
            border-radius: 6px;
            font-weight: 600;
            font-size: 11px;
            color: #2d3748;
            border-left: 3px solid #5a6c7d;
        }

        .empty-state {
            text-align: center;
            padding: 30px;
            color: #718096;
            font-style: italic;
        }

        /* Column width optimization */
        .col-no { width: 35px; }
        .col-nama { width: 18%; }
        .col-barang { width: 22%; }
        .col-keperluan { width: 20%; }
        .col-tgl-pinjam { width: 13%; }
        .col-tgl-kembali { width: 13%; }
        .col-status { width: 11%; }

        @media print {
            body {
                padding: 15px;
            }

            .header-section {
                page-break-after: avoid;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

            tbody tr:nth-child(even) {
                background: #fafbfc !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .footer-section {
                page-break-before: avoid;
            }

            .status-badge {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            @page {
                margin: 1.5cm;
                size: A4 landscape;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header-section">
        <div class="company-name">Sistem Inventaris Barang</div>
        <div class="company-address">
            Jl. Stadion No. 10, Metro, Lampung 12345 | Telp: (021) 1234-5678 | Email: zhafif@inventaris.com
        </div>
        <div class="report-title">Laporan Data Peminjaman</div>
    </div>

    <!-- Report Info -->
    <div class="report-info">
        <div class="info-item">
            <span class="info-label">Tanggal Cetak:</span>
            <span class="info-value">{{ now()->format('d-m-Y H:i') }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Periode:</span>
            <span class="info-value">Semua Data</span>
        </div>
        <div class="info-item">
            <span class="info-label">Status:</span>
            <span class="info-value">{{ request('status') ? ucfirst(request('status')) : 'Semua' }}</span>
        </div>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th class="col-no">No</th>
                <th class="col-nama">Nama Peminjam</th>
                <th class="col-barang">Barang Dipinjam</th>
                <th class="col-keperluan">Keperluan</th>
                <th class="col-tgl-pinjam">Tanggal Pinjam</th>
                <th class="col-tgl-kembali">Tanggal Kembali</th>
                <th class="col-status">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <span class="nama-peminjam">{{ $item->nama_peminjam }}</span>
                    </td>
                    <td>
                        <ul class="item-list">
                            @foreach ($item->detail as $detail)
                                <li>{{ $detail->barang->nama_barang ?? '-' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <span class="keperluan-text">{{ $item->keperluan }}</span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d/m/Y') }}</td>
                    <td>{{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d/m/Y') : '-' }}</td>
                    <td>
                        <span class="status-badge status-{{ $item->status }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty-state">
                        Tidak ada data peminjaman yang tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Summary -->
    <div class="total-summary">
        Total Data Peminjaman: {{ count($peminjaman) }} Record
    </div>

</body>

</html>