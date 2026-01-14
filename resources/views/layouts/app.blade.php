<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ===== NAVBAR ===== */
        nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: #2d3748;
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.4rem;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .nav-logo:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .nav-title {
            display: flex;
            flex-direction: column;
        }

        .nav-title h5 {
            font-size: 1.15rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }

        .nav-title span {
            font-size: 0.8rem;
            color: #a0aec0;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* ===== NOTIFICATION BELL ===== */
        .notification-bell {
            position: relative;
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #f8f9fc 0%, #f1f3f8 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1.5px solid rgba(99, 102, 241, 0.15);
        }

        .notification-bell:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .notification-bell:hover i {
            color: white;
        }

        .notification-bell i {
            font-size: 1.3rem;
            color: #667eea;
            transition: all 0.3s ease;
        }

        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            min-width: 22px;
            height: 22px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 6px;
            box-shadow: 0 2px 8px rgba(245, 101, 101, 0.4);
            animation: pulse 2s infinite;
            border: 2px solid white;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        @keyframes ring {
            0% { transform: rotate(0deg); }
            10% { transform: rotate(15deg); }
            20% { transform: rotate(-15deg); }
            30% { transform: rotate(10deg); }
            40% { transform: rotate(-10deg); }
            50% { transform: rotate(0deg); }
            100% { transform: rotate(0deg); }
        }

        .notification-bell.has-new i {
            animation: ring 3s ease-in-out infinite;
        }

        /* ===== NOTIFICATION DROPDOWN ===== */
        .notification-dropdown {
            position: absolute;
            top: calc(100% + 15px);
            right: 0;
            width: 420px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.15);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(99, 102, 241, 0.1);
            max-height: 600px;
            display: flex;
            flex-direction: column;
        }

        .notification-dropdown::before {
            content: '';
            position: absolute;
            top: -8px;
            right: 20px;
            width: 16px;
            height: 16px;
            background: white;
            transform: rotate(45deg);
            border-left: 1px solid rgba(99, 102, 241, 0.1);
            border-top: 1px solid rgba(99, 102, 241, 0.1);
        }

        .notification-bell.active .notification-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .notification-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e8ecf1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header h6 {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .notification-count {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.6rem;
            border-radius: 8px;
        }

        .mark-all-read {
            font-size: 0.85rem;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .mark-all-read:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .notification-list {
            overflow-y: auto;
            max-height: 450px;
        }

        .notification-list::-webkit-scrollbar {
            width: 6px;
        }

        .notification-list::-webkit-scrollbar-track {
            background: #f1f3f8;
        }

        .notification-list::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }

        .notification-item {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f3f8;
            display: flex;
            gap: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            position: relative;
        }

        .notification-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        }

        .notification-item.unread {
            background: #f8f9ff;
        }

        .notification-item.unread::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .notification-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
            color: white;
        }

        .notification-icon.message {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            box-shadow: 0 4px 12px rgba(66, 153, 225, 0.25);
        }

        .notification-icon.alert {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            box-shadow: 0 4px 12px rgba(237, 137, 54, 0.25);
        }

        .notification-icon.success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            box-shadow: 0 4px 12px rgba(72, 187, 120, 0.25);
        }

        .notification-icon.system {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.25);
        }

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0 0 0.4rem 0;
            line-height: 1.3;
        }

        .notification-message {
            font-size: 0.85rem;
            color: #718096;
            margin: 0 0 0.5rem 0;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .notification-time {
            font-size: 0.75rem;
            color: #a0aec0;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .notification-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #e8ecf1;
            text-align: center;
        }

        .view-all-btn {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .view-all-btn:hover {
            color: #764ba2;
            gap: 0.7rem;
        }

        .empty-notification {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .empty-notification i {
            font-size: 4rem;
            color: #e8ecf1;
            margin-bottom: 1rem;
            display: block;
        }

        .empty-notification p {
            color: #a0aec0;
            margin: 0;
            font-size: 0.95rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 1.2rem;
            background: linear-gradient(135deg, #f8f9fc 0%, #f1f3f8 100%);
            border-radius: 12px;
            border: 1.5px solid rgba(99, 102, 241, 0.15);
            transition: all 0.3s ease;
        }

        .user-info:hover {
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-details strong {
            font-size: 0.95rem;
            color: #2d3748;
            font-weight: 600;
        }

        .user-details small {
            font-size: 0.75rem;
            color: #a0aec0;
        }

        .logout-btn {
            background: linear-gradient(135deg, #fc8181 0%, #f56565 100%);
            border: none;
            color: white;
            padding: 0.65rem 1.3rem;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(252, 129, 129, 0.3);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(252, 129, 129, 0.4);
        }

        /* ===== CONTAINER ===== */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2.5rem 2rem;
            flex: 1;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-header h2 {
            color: #2d3748;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            color: #718096;
            font-size: 1.05rem;
            font-weight: 400;
        }

        /* ===== CARD GRID ===== */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(99, 102, 241, 0.1);
            position: relative;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .menu-card:hover::before {
            opacity: 1;
        }

        .menu-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.25);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .card-image-wrapper {
            width: 100%;
            height: 270px;
            background: linear-gradient(135deg, #fafbfc 0%, #f3f4f8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .card-image-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .menu-card:hover .card-image-wrapper::before {
            opacity: 1;
        }

        .card-icon {
            font-size: 5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.4s ease;
        }

        .menu-card:hover .card-icon {
            transform: scale(1.15) rotate(5deg);
        }

        .menu-card img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.1));
        }

        .menu-card:hover img {
            transform: scale(1.12);
        }

        .card-content {
            padding: 1.75rem;
            background: white;
            text-align: center;
            position: relative;
        }

        .card-content h5 {
            font-size: 1.15rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            transition: all 0.3s ease;
        }

        .menu-card:hover .card-content h5 {
            color: #667eea;
        }

        .card-content h5 i {
            font-size: 1.3rem;
        }

        .card-content p {
            font-size: 0.9rem;
            color: #a0aec0;
            margin: 0;
            line-height: 1.5;
        }

        /* ===== FOOTER ===== */
        footer {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: #718096;
            text-align: center;
            padding: 2rem;
            font-size: 0.9rem;
            margin-top: auto;
            border-top: 1px solid rgba(99, 102, 241, 0.1);
        }

        footer strong {
            color: #2d3748;
            font-weight: 600;
        }

        .footer-links {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #a0aec0;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .footer-links a:hover {
            color: #667eea;
            transform: translateY(-2px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .notification-dropdown {
                width: 360px;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .nav-brand {
                width: 100%;
                justify-content: center;
            }

            .nav-actions {
                width: 100%;
                justify-content: space-between;
            }

            .user-info {
                flex: 1;
            }

            .main-container {
                padding: 1.5rem 1rem;
            }

            .page-header h2 {
                font-size: 1.75rem;
            }

            .card-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .user-details {
                display: none;
            }

            .card-image-wrapper {
                height: 220px;
            }

            .notification-dropdown {
                width: calc(100vw - 40px);
                right: -100px;
            }

            .notification-dropdown::before {
                right: 115px;
            }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .menu-card {
            animation: fadeInUp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            opacity: 0;
        }

        .menu-card:nth-child(1) { animation-delay: 0.1s; }
        .menu-card:nth-child(2) { animation-delay: 0.2s; }
        .menu-card:nth-child(3) { animation-delay: 0.3s; }
        .menu-card:nth-child(4) { animation-delay: 0.4s; }
        .menu-card:nth-child(5) { animation-delay: 0.5s; }
        .menu-card:nth-child(6) { animation-delay: 0.6s; }

        .card-icon {
            animation: float 3s ease-in-out infinite;
        }

        .menu-card:nth-child(2) .card-icon {
            animation-delay: 0.3s;
        }

        .menu-card:nth-child(3) .card-icon {
            animation-delay: 0.6s;
        }

        /* ===== SCROLL BAR ===== */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f3f8;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5568d3 0%, #6a3f91 100%);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="nav-container">
            <div class="nav-brand">
                <div class="nav-logo">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="nav-title">
                    <h5>Sistem Inventaris Perpustakaan</h5>
                    <span>MANAGEMENT SYSTEM LIBRARY</span>
                </div>
            </div>
            <div class="nav-actions">
                <!-- Notification Bell -->
                <div class="notification-bell has-new" id="notificationBell">
                    <i class="bi bi-bell-fill"></i>
                    <span class="notification-badge">5</span>
                    
                    <!-- Notification Dropdown -->
                    <div class="notification-dropdown">
                        <div class="notification-header">
                            <h6>
                                Notifikasi
                                <span class="notification-count">5</span>
                            </h6>
                            <a href="#" class="mark-all-read">Tandai Sudah Dibaca</a>
                        </div>
                        
                        <div class="notification-list">
                            <!-- Notification Item 1 -->
                            <a href="#" class="notification-item unread">
                                <div class="notification-icon message">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">Pesan Baru dari Admin</div>
                                    <div class="notification-message">
                                        Permintaan barang Anda telah disetujui. Silakan cek email untuk detail lebih lanjut.
                                    </div>
                                    <div class="notification-time">
                                        <i class="bi bi-clock"></i>
                                        5 menit yang lalu
                                    </div>
                                </div>
                            </a>

                            <!-- Notification Item 2 -->
                            <a href="#" class="notification-item unread">
                                <div class="notification-icon alert">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">Stok Barang Menipis</div>
                                    <div class="notification-message">
                                        Laptop Dell XPS 15 tersisa 2 unit. Segera lakukan pemesanan ulang.
                                    </div>
                                    <div class="notification-time">
                                        <i class="bi bi-clock"></i>
                                        1 jam yang lalu
                                    </div>
                                </div>
                            </a>

                            <!-- Notification Item 3 -->
                            <a href="#" class="notification-item unread">
                                <div class="notification-icon success">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">Barang Berhasil Ditambahkan</div>
                                    <div class="notification-message">
                                        20 unit Mouse Wireless berhasil ditambahkan ke inventaris.
                                    </div>
                                    <div class="notification-time">
                                        <i class="bi bi-clock"></i>
                                        3 jam yang lalu
                                    </div>
                                </div>
                            </a>

                            <!-- Notification Item 4 -->
                            <a href="#" class="notification-item">
                                <div class="notification-icon system">
                                    <i class="bi bi-gear-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">Update Sistem</div>
                                    <div class="notification-message">
                                        Sistem akan mengalami maintenance pada Minggu, 30 Oktober pukul 00:00 - 02:00 WIB.
                                    </div>
                                    <div class="notification-time">
                                        <i class="bi bi-clock"></i>
                                        1 hari yang lalu
                                    </div>
                                </div>
                            </a>

                            <!-- Notification Item 5 -->
                            <a href="#" class="notification-item">
                                <div class="notification-icon message">
                                    <i class="bi bi-chat-dots-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">Komentar Baru</div>
                                    <div class="notification-message">
                                        Manager memberikan komentar pada laporan bulanan Anda.
                                    </div>
                                    <div class="notification-time">
                                        <i class="bi bi-clock"></i>
                                        2 hari yang lalu
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="notification-footer">
                            <a href="#" class="view-all-btn">
                                Lihat Semua Notifikasi
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <strong>{{ Auth::user()->username }}</strong>
                    </div>
                </div>
                <form action="/logout" method="post" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-container">
        @yield('konten')
    </div>

    <!-- Footer -->
    <footer>
        <strong>&copy; {{ date('Y') }} Sistem Inventaris Barang</strong>
        <div class="footer-links">
            <a href="#"><i class="bi bi-shield-check"></i>Privacy Policy</a>
            <a href="#"><i class="bi bi-file-text"></i>Terms of Service</a>
            <a href="#"><i class="bi bi-envelope"></i>Contact Us</a>
        </div>
    </footer>

    <script>
        // Notification Bell Toggle
        const notificationBell = document.getElementById('notificationBell');
        
        notificationBell.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!notificationBell.contains(e.target)) {
                notificationBell.classList.remove('active');
            }
        });

        // Prevent dropdown from closing when clicking inside
        document.querySelector('.notification-dropdown').addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Mark all as read functionality
        document.querySelector('.mark-all-read').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove unread class from all items
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            unreadItems.forEach(item => {
                item.classList.remove('unread');
            });
            
            // Update badge
            const badge = document.querySelector('.notification-badge');
            const countSpan = document.querySelector('.notification-count');
            badge.textContent = '0';
            countSpan.textContent = '0';
            
            // Remove has-new class to stop animation
            notificationBell.classList.remove('has-new');
            
            // Optional: Show success message
            alert('Semua notifikasi telah ditandai sebagai sudah dibaca');
        });

        // Mark individual notification as read when clicked
        document.querySelectorAll('.notification-item').forEach(item => {
            item.addEventListener('click', function(e) {
                if (this.classList.contains('unread')) {
                    this.classList.remove('unread');
                    
                    // Update badge count
                    const badge = document.querySelector('.notification-badge');
                    const countSpan = document.querySelector('.notification-count');
                    let currentCount = parseInt(badge.textContent);
                    
                    if (currentCount > 0) {
                        currentCount--;
                        badge.textContent = currentCount;
                        countSpan.textContent = currentCount;
                        
                        if (currentCount === 0) {
                            notificationBell.classList.remove('has-new');
                        }
                    }
                }
            });
        });

        // Simulate new notification (for demo purposes)
        function addNewNotification() {
            const badge = document.querySelector('.notification-badge');
            const countSpan = document.querySelector('.notification-count');
            let currentCount = parseInt(badge.textContent);
            currentCount++;
            badge.textContent = currentCount;
            countSpan.textContent = currentCount;
            notificationBell.classList.add('has-new');
            
            // Optional: Play notification sound
            // new Audio('notification-sound.mp3').play();
        }

        // Example: Add notification every 30 seconds (remove in production)
        // setInterval(addNewNotification, 30000);
    </script>

</body>
</html>