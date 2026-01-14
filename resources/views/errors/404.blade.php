@php
$errorCode = "404";
$errorTitle = "Halaman Tidak Ditemukan";
$errorDescription = "Maaf, halaman yang Anda cari tidak ditemukan. Mungkin halaman telah dipindahkan atau URL yang Anda masukkan salah.";
$errorIcon = '<svg viewBox="0 0 24 24" fill="white">
    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
</svg>';
$errorButtons = '
    <a href="/" class="btn btn-primary">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
        </svg>
        Kembali ke Beranda
    </a>
    <button onclick="goBack()" class="btn btn-secondary">Halaman Sebelumnya</button>
';
$additionalInfo = '
    <div class="additional-info">
        <div class="info-title">Saran untuk Anda:</div>
        <ul class="info-list">
            <li>Periksa kembali URL yang Anda masukkan</li>
            <li>Gunakan menu navigasi untuk menemukan halaman</li>
            <li>Kembali ke halaman sebelumnya</li>
        </ul>
    </div>
';
@endphp

@include('errors.layout',   [
    'code' => $errorCode,
    'title' => $errorTitle,
    'description' => $errorDescription,
    'icon' => $errorIcon,
    'buttons' => $errorButtons,
    'additional' => $additionalInfo,
])
