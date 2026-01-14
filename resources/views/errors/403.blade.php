@php
$errorCode = "403";
$errorTitle = "Akses Ditolak";
$errorDescription = "Anda tidak memiliki izin untuk mengakses halaman ini.";
$errorIcon = '<svg viewBox="0 0 24 24" fill="white">
    <path d="M12 2L2 22h20L12 2zm1 14h-2v-2h2v2zm0-4h-2V9h2v3z"/>
</svg>';
$errorButtons = '
    <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    <button onclick="goBack()" class="btn btn-secondary">Halaman Sebelumnya</button>
';
$additionalInfo = '
    <div class="additional-info">
        <div class="info-title">Saran:</div>
        <ul class="info-list">
            <li>Coba login dengan akun berbeda</li>
            <li>Hubungi admin jika merasa ini kesalahan</li>
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

