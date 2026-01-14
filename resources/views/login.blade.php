@extends('layouts.auth')

@section('title', 'Halaman Login')

@section('konten')
<style>
    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        background: #f5f7fa;
    }

    .auth-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 450px;
        width: 100%;
    }

    .auth-header {
        background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
        padding: 2.5rem 2rem;
        text-align: center;
        color: white;
    }

    .auth-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
        color: white;
    }

    .auth-header p {
        font-size: 0.95rem;
        margin: 0;
        opacity: 0.9;
    }

    .auth-illustration {
        width: 180px;
        height: 180px;
        margin: 1.5rem auto 0;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .auth-illustration img {
        width: 140px;
        height: 140px;
        object-fit: contain;
    }

    .auth-body {
        padding: 2.5rem 2rem;
    }

    .auth-body h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2d3748;
        margin: 0 0 1.5rem 0;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-label i {
        margin-right: 0.3rem;
        color: #718096;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #f7fafc;
    }

    .form-input:focus {
        outline: none;
        border-color: #4a5568;
        background: white;
        box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
    }

    .form-input::placeholder {
        color: #a0aec0;
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.9rem;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
        border: 2px solid #10b981;
    }

    .alert-success i {
        color: #10b981;
        font-size: 1.2rem;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
        border: 2px solid #e53e3e;
    }

    .alert-danger i {
        color: #e53e3e;
        font-size: 1.2rem;
    }

    .btn-login {
        width: 100%;
        padding: 0.85rem 1.5rem;
        background: #4a5568;
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-login:hover {
        background: #2d3748;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 85, 104, 0.3);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid #e2e8f0;
    }

    .auth-footer small {
        color: #718096;
        font-size: 0.9rem;
    }

    .auth-footer a {
        color: #4a5568;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .auth-footer a:hover {
        color: #2d3748;
        text-decoration: underline;
    }

    /* Animation */
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

    .auth-card {
        animation: fadeInUp 0.6s ease;
    }

    @media (max-width: 576px) {
        .auth-header {
            padding: 2rem 1.5rem;
        }

        .auth-header h2 {
            font-size: 1.5rem;
        }

        .auth-illustration {
            width: 150px;
            height: 150px;
        }

        .auth-illustration img {
            width: 110px;
            height: 110px;
        }

        .auth-body {
            padding: 2rem 1.5rem;
        }
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <!-- Header -->
        <div class="auth-header">
            <h2><i class="bi bi-box-seam"></i> Sistem Inventaris</h2>
            <p>Masuk dengan akun Anda untuk melanjutkan</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <!-- Success Alert -->
            @if (session('sukses'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill"></i>
                    <span><strong>Berhasil!</strong> {{ session('sukses') }}</span>
                </div>
            @endif

            <!-- Error Alert -->
            @if (session('gagal'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>{{ session('gagal') }}</span>
                </div>
            @endif

            <h3>
                <i class="bi bi-person-circle"></i>
                Login
            </h3>

            <form action="/login/submit" method="POST">
                @csrf

                <div class="form-group">
                    <label for="username" class="form-label">
                        <i class="bi bi-person"></i>Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        class="form-input"
                        placeholder="Masukkan username" 
                        required
                        autofocus>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i>Password
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-input"
                        placeholder="Masukkan password (minimal 4 karakter)" 
                        required
                        minlength="4">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-login">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </button>
                </div>

                <div class="auth-footer">
                    <small>
                        Belum punya akun? 
                        <a href="/register">
                            <i class="bi bi-person-plus"></i>
                            Daftar Sekarang
                        </a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endsection