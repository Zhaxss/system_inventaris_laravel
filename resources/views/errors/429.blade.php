@php
$errorCode = "429";
$errorTitle = "Terlalu Banyak Permintaan";
$errorDescription = "Silakan coba lagi beberapa saat.";
$errorIcon = '<svg viewBox="0 0 24 24" fill="white">
    <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm-1 5h2v6h-2zm0 8h2v2h-2z"/>
</svg>';
$errorButtons = '
    <button onclick="location.reload()" class="btn btn-primary">Coba Lagi</button>
';
$additionalInfo = '
    <div class="additional-info">
        <div class="info-title">Tips:</div>
        <ul class="info-list">
            <li>Tunggu beberapa detik</li>
            <li>Jangan refresh terlalu cepat</li>
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

