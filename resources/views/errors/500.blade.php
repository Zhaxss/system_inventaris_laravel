@php
$errorCode = "500";
$errorTitle = "Kesalahan Server";
$errorDescription = "Terjadi kesalahan di server kami. Mohon coba lagi nanti.";
$errorIcon = '<svg viewBox="0 0 24 24" fill="white">
    <circle cx="12" cy="12" r="10"/>
</svg>';
$errorButtons = '
    <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
';
$additionalInfo = '
    <div class="additional-info">
        <div class="info-title">Catatan:</div>
        <ul class="info-list">
            <li>Bukan kesalahan Anda</li>
            <li>Tim kami sedang memperbaiki</li>
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

