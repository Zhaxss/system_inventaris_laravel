@extends('layouts.auth')
@section('title', 'Halaman Register')
@section('konten')

<style>
    * {
        box-sizing: border-box;
    }

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
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        max-width: 600px;
        width: 100%;
        margin: 2rem auto;
    }

    .auth-header {
        background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
        padding: 3rem 2.5rem 2rem;
        text-align: center;
        color: white;
    }

    .auth-header h2 {
        font-size: 1.875rem;
        font-weight: 700;
        margin: 0 0 0.75rem 0;
        color: white;
        letter-spacing: -0.025em;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.625rem;
    }

    .auth-header h2 i {
        font-size: 2rem;
    }

    .auth-header p {
        font-size: 0.9375rem;
        margin: 0;
        opacity: 0.92;
        line-height: 1.6;
        max-width: 420px;
        margin: 0 auto;
    }

    .auth-body {
        padding: 2.5rem;
    }

    .auth-body h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2d3748;
        margin: 0 0 2rem 0;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        letter-spacing: -0.0125em;
    }

    .auth-body h3 i {
        font-size: 1.375rem;
        color: #4a5568;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.625rem;
        font-size: 0.9375rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label i {
        color: #4a5568;
        font-size: 1rem;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        background: #f7fafc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #2d3748;
        line-height: 1.5;
    }

    .form-textarea {
        resize: vertical;
        min-height: 90px;
        line-height: 1.6;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #4a5568;
        background: white;
        box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.08);
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #a0aec0;
    }

    .form-select {
        cursor: pointer;
        color: #4a5568;
    }

    .form-select option[disabled] {
        color: #a0aec0;
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 10px;
        margin-bottom: 1.75rem;
        border: 2px solid #e53e3e;
        background: #fee2e2;
    }

    .alert ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .alert li {
        color: #991b1b;
        font-size: 0.9375rem;
        padding: 0.375rem 0;
        display: flex;
        align-items: flex-start;
        gap: 0.625rem;
        line-height: 1.5;
    }

    .alert li:before {
        content: "•";
        color: #e53e3e;
        font-weight: bold;
        font-size: 1.25rem;
        line-height: 1;
        margin-top: 0.125rem;
    }

    .btn-register {
        width: 100%;
        padding: 1rem 1.5rem;
        background: #4a5568;
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.625rem;
        margin-top: 0.75rem;
        letter-spacing: -0.0125em;
    }

    .btn-register i {
        font-size: 1.125rem;
    }

    .btn-register:hover {
        background: #2d3748;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(45, 55, 72, 0.25);
    }

    .btn-register:active {
        transform: translateY(0);
    }

    .auth-footer {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.75rem;
        border-top: 2px solid #e2e8f0;
    }

    .auth-footer small {
        color: #718096;
        font-size: 0.9375rem;
        line-height: 1.5;
    }

    .auth-footer a {
        color: #4a5568;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
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

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
            margin-bottom: 0;
        }

        .auth-header {
            padding: 2.5rem 1.75rem 1.75rem;
        }

        .auth-header h2 {
            font-size: 1.625rem;
        }

        .auth-header p {
            font-size: 0.875rem;
        }

        .auth-body {
            padding: 2rem 1.75rem;
        }

        .auth-body h3 {
            font-size: 1.125rem;
            margin-bottom: 1.75rem;
        }

        .form-group {
            margin-bottom: 1.125rem;
        }
    }

    @media (max-width: 480px) {
        .auth-container {
            padding: 1rem 0.75rem;
        }

        .auth-card {
            border-radius: 16px;
        }

        .auth-header {
            padding: 2rem 1.5rem 1.5rem;
        }

        .auth-body {
            padding: 1.75rem 1.5rem;
        }
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <!-- Header -->
        <div class="auth-header">
            <h2>
                <i class="bi bi-person-plus-fill"></i>
                Sistem Inventaris
            </h2>
            <p>Silakan daftar untuk membuat akun baru dan mulai menggunakan aplikasi kami</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <!-- Error Alert -->
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3>
                <i class="bi bi-clipboard-check"></i>
                Buat Akun Petugas
            </h3>

            <form action="/register/submit" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="nama_lengkap" class="form-label">
                            <i class="bi bi-person"></i>
                            <span>Nama Lengkap</span>
                        </label>
                        <input 
                            type="text" 
                            name="nama_lengkap" 
                            id="nama_lengkap" 
                            class="form-input"
                            value="{{ old('nama_lengkap') }}" 
                            placeholder="Masukkan nama lengkap" 
                            required
                            autofocus>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">
                            <i class="bi bi-at"></i>
                            <span>Username</span>
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            id="username" 
                            class="form-input"
                            value="{{ old('username') }}"
                            placeholder="Masukkan username" 
                            required>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="alamat" class="form-label">
                        <i class="bi bi-geo-alt"></i>
                        <span>Alamat</span>
                    </label>
                    <textarea 
                        name="alamat" 
                        id="alamat" 
                        class="form-textarea"
                        placeholder="Masukkan alamat lengkap" 
                        required>{{ old('alamat') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nohp" class="form-label">
                            <i class="bi bi-telephone"></i>
                            <span>No. Handphone</span>
                        </label>
                        <input 
                            type="tel" 
                            name="nohp" 
                            id="nohp" 
                            class="form-input"
                            value="{{ old('nohp') }}"
                            placeholder="08xxxxxxxxxx" 
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope"></i>
                            <span>Email</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-input"
                            value="{{ old('email') }}" 
                            placeholder="contoh@email.com" 
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i>
                        <span>Password</span>
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-input"
                        placeholder="Minimal 4 karakter" 
                        required
                        minlength="4">
                    <input type="hidden" name="status" value="petugas">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-register">
                        <i class="bi bi-person-check"></i>
                        <span>Daftar Sekarang</span>
                    </button>
                </div>

                <div class="auth-footer">
                    <small>
                        Sudah punya akun? 
                        <a href="/login">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Login Sekarang</span>
                        </a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endsection