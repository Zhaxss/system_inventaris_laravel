@php
$errorCode = "401";
$errorTitle = "Tidak Diizinkan";
$errorDescription = "Anda harus login untuk mengakses halaman ini.";
$errorIcon = '<svg viewBox="0 0 24 24" fill="white">
    <path d="M12 1a4 4 0 00-4 4v2H6v14h12V7h-2V5a4 4 0 00-4-4zm0 2a2 2 0 012 2v2h-4V5a2 2 0 012-2z"/>
</svg>';
$errorButtons = '
    <a href="/login" class="btn btn-primary">
        Login
    </a>
    <button onclick="goBack()" class="btn btn-secondary">Halaman Sebelumnya</button>
';
$additionalInfo = '
    <div class="additional-info">
        <div class="info-title">Kenapa saya melihat ini?</div>
        <ul class="info-list">
            <li>Akun Anda belum login</li>
            <li>Ada batasan akses untuk halaman ini</li>
        </ul>
    </div>
';
@endphp

@include('errors.layout', [
    'code' => $errorCode,
    'title' => $errorTitle,
    'description' => $errorDescription,
    'icon' => $errorIcon,
    'buttons' => $errorButtons,
    'additional' => $additionalInfo,
])
