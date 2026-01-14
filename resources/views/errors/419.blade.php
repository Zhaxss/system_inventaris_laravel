@php
$errorCode = "419";
$errorTitle = "Sesi Berakhir";
$errorDescription = "Sesi Anda telah berakhir. Silakan refresh halaman.";
$errorIcon = '<svg viewBox="0 0 24 24" fill="white">
    <path d="M12 8v5l4 2m4-3a8 8 0 11-8-8"/>
</svg>';
$errorButtons = '
    <button onclick="location.reload()" class="btn btn-primary">Reload Halaman</button>
';
$additionalInfo = '
    <div class="additional-info">
        <div class="info-title">Mengapa terjadi?</div>
        <ul class="info-list">
            <li>Sesi login Anda habis</li>
            <li>Terlalu lama tidak aktif</li>
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

