<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory Management System - Solusi Modern untuk Bisnis Anda</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-blue: #6366f1;
            --primary-purple: #8b5cf6;
            --soft-pink: #ec4899;
            --soft-mint: #10b981;
            --soft-peach: #f59e0b;
            --dark-bg: #0f172a;
            --dark-secondary: #1e293b;
            --light-text: #94a3b8;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--dark-bg);
            overflow-x: hidden;
            color: var(--white);
        }

        /* ===== ANIMATED BACKGROUND ===== */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        }

        .animated-bg::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            top: -100px;
            left: -100px;
            animation: float 20s ease-in-out infinite;
        }

        .animated-bg::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
            animation: float 25s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(100px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-50px, 100px) scale(0.9);
            }
        }

        /* ===== NAVIGATION ===== */
        .navbar {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
            padding: 1.25rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-logo {
            width: 40px;
            height: 40px;
            /* background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%); */
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 6rem 0 4rem;
            position: relative;
        }

        .hero-content {
            text-align: center;
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 2rem;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4);
            }

            50% {
                box-shadow: 0 0 0 15px rgba(99, 102, 241, 0);
            }
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -2px;
        }

        .hero-gradient-text {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--light-text);
            max-width: 700px;
            margin: 0 auto 3rem;
            line-height: 1.8;
            font-weight: 400;
        }

        /* ===== BUTTONS ===== */
        .btn-hero {
            padding: 1rem 2.5rem;
            border-radius: 14px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
        }

        .btn-hero::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-hero:hover::before {
            width: 400px;
            height: 400px;
        }

        .btn-primary-gradient {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            color: white;
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.4);
        }

        .btn-primary-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.5);
        }

        .btn-outline-gradient {
            background: transparent;
            border: 2px solid rgba(99, 102, 241, 0.5);
            color: var(--white);
        }

        .btn-outline-gradient:hover {
            background: rgba(99, 102, 241, 0.1);
            border-color: var(--primary-blue);
            transform: translateY(-3px);
        }

        /* ===== FEATURES GRID ===== */
        .features-section {
            padding: 5rem 0;
            position: relative;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.15rem;
            color: var(--light-text);
            max-width: 600px;
            margin: 0 auto 4rem;
        }

        .feature-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(99, 102, 241, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(30, 41, 59, 0.8);
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 20px 50px rgba(99, 102, 241, 0.2);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: white;
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .feature-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1rem;
        }

        .feature-text {
            color: var(--light-text);
            font-size: 1rem;
            line-height: 1.7;
        }

        /* ===== STATS SECTION ===== */
        .stats-section {
            background: rgba(30, 41, 59, 0.3);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(99, 102, 241, 0.1);
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
            padding: 4rem 0;
            margin: 4rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--light-text);
            font-weight: 500;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            padding: 6rem 0;
            text-align: center;
        }

        .cta-box {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            border: 2px solid rgba(99, 102, 241, 0.3);
            border-radius: 30px;
            padding: 4rem 3rem;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .cta-box::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.5rem;
        }

        .cta-text {
            font-size: 1.15rem;
            color: var(--light-text);
            margin-bottom: 2.5rem;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(99, 102, 241, 0.1);
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--light-text);
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-blue);
        }

        .footer-text {
            text-align: center;
            color: var(--light-text);
            font-size: 0.9rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 3rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 4rem 0 3rem;
            }

            .hero-title {
                font-size: 2.5rem;
                letter-spacing: -1px;
            }

            .hero-subtitle {
                font-size: 1rem;
                margin-bottom: 2rem;
            }

            .btn-hero {
                padding: 0.85rem 2rem;
                font-size: 1rem;
            }

            .feature-card {
                padding: 2rem;
            }

            .cta-title {
                font-size: 2rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }
        }

        /* ===== SCROLL ANIMATIONS ===== */
        .fade-in-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== LOADER ===== */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--dark-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(99, 102, 241, 0.2);
            border-top-color: var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- Loader -->
    <div class="loader" id="loader">
        <div class="spinner"></div>
    </div>

    <!-- Animated Background -->
    <div class="animated-bg"></div>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="navbar-brand">
                    <div class="nav-logo">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    {{-- <div class="nav-logo">
                        <img src="/img/pinjam.png" alt="Logo" style="height: 40px; width: auto;">
                    </div> --}}

                    <span>InventarisZha</span>
                </div>
                @auth
                    <a href="/dashboard" class="btn btn-primary-gradient btn-sm px-4">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="bi bi-star-fill"></i>
                    <span>Platform Terpercaya untuk Manajemen Inventaris</span>
                </div>

                <h1 class="hero-title">
                    Kelola Inventaris dengan
                    <span class="hero-gradient-text">Mudah & Efisien</span>
                </h1>

                <p class="hero-subtitle">
                    Solusi modern untuk mengelola dan memantau inventaris bisnis Anda secara real-time.
                    Tingkatkan produktivitas dengan sistem peminjaman yang transparan dan terorganisir.
                </p>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    @auth
                        <a href="/dashboard" class="btn btn-hero btn-primary-gradient">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Masuk sebagai {{ Auth::user()->status }}
                        </a>
                    @else
                        <a href="/login" class="btn btn-hero btn-primary-gradient">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Masuk Aplikasi
                        </a>
                    @endauth

                    <a href="http://lab_praktek.test" class="btn btn-hero btn-outline-gradient">
                        <i class="bi bi-info-circle"></i>
                        Halaman LAB Praktek
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-item fade-in-scroll">
                        <span class="stat-number">99%</span>
                        <div class="stat-label">Kepuasan Pengguna</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item fade-in-scroll">
                        <span class="stat-number">24/7</span>
                        <div class="stat-label">Akses Sistem</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item fade-in-scroll">
                        <span class="stat-number">100%</span>
                        <div class="stat-label">Keamanan Data</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="section-title fade-in-scroll">Fitur Unggulan</h2>
            <p class="section-subtitle fade-in-scroll">
                Sistem yang dirancang untuk memudahkan pengelolaan inventaris Anda
            </p>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card fade-in-scroll">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h3 class="feature-title">Manajemen Real-Time</h3>
                        <p class="feature-text">
                            Pantau stok dan status peminjaman secara langsung dengan sistem notifikasi otomatis untuk
                            setiap perubahan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card fade-in-scroll">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="feature-title">Keamanan Terjamin</h3>
                        <p class="feature-text">
                            Data Anda dilindungi dengan enkripsi tingkat enterprise dan backup otomatis setiap hari.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card fade-in-scroll">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3 class="feature-title">Laporan & Analitik</h3>
                        <p class="feature-text">
                            Dapatkan insight mendalam dengan laporan komprehensif dan visualisasi data yang mudah
                            dipahami.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card fade-in-scroll">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="feature-title">Multi-User System</h3>
                        <p class="feature-text">
                            Kelola tim dengan sistem role dan permission yang fleksibel untuk berbagai tingkat akses.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card fade-in-scroll">
                        <div class="feature-icon">
                            <i class="bi bi-bell-fill"></i>
                        </div>
                        <h3 class="feature-title">Notifikasi Cerdas</h3>
                        <p class="feature-text">
                            Sistem pengingat otomatis untuk pengembalian barang dan pembaruan stok yang perlu perhatian.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card fade-in-scroll">
                        <div class="feature-icon">
                            <i class="bi bi-phone-fill"></i>
                        </div>
                        <h3 class="feature-title">Responsive Design</h3>
                        <p class="feature-text">
                            Akses dari perangkat apapun - desktop, tablet, atau smartphone dengan pengalaman optimal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box fade-in-scroll">
                <h2 class="cta-title">Siap Meningkatkan Efisiensi Bisnis?</h2>
                <p class="cta-text">
                    Bergabunglah dengan ribuan pengguna yang telah mempercayai sistem kami untuk mengelola inventaris
                    mereka.
                </p>
                @auth
                    <a href="/dashboard" class="btn btn-hero btn-primary-gradient">
                        <i class="bi bi-rocket-takeoff"></i>
                        Mulai Sekarang
                    </a>
                @else
                    <a href="/login" class="btn btn-hero btn-primary-gradient">
                        <i class="bi bi-rocket-takeoff"></i>
                        Mulai Gratis
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-links">
                <a href="#"><i class="bi bi-shield-check me-1"></i>Privacy Policy</a>
                <a href="#"><i class="bi bi-file-text me-1"></i>Terms of Service</a>
                <a href="#"><i class="bi bi-envelope me-1"></i>Contact Us</a>
                <a href="#"><i class="bi bi-question-circle me-1"></i>Help Center</a>
            </div>
            <div class="footer-text">
                <p class="mb-0">&copy; 2025 InventoryHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Loader
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loader').classList.add('hidden');
            }, 500);
        });

        // Scroll Animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-scroll').forEach(el => {
            observer.observe(el);
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Parallax effect for background
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.animated-bg');
            if (parallax) {
                parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });
    </script>
</body>

</html>
