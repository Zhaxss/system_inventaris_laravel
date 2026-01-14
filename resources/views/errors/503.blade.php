@php
$errorCode = "503";
$errorTitle = "Sedang Maintenance";
$errorDescription = "Aplikasi sedang dalam perawatan.";
$errorIcon = '<svg viewBox="0 0 24 24" fill="white">
    <path d="M3 13h2a7 7 0 0014 0h2"/>
</svg>';
$errorButtons = '
    <button onclick="location.reload()" class="btn btn-primary">Refresh</button>
';
$additionalInfo = '
    <div class="additional-info">
        <div class="info-title">Info:</div>
        <ul class="info-list">
            <li>Server sedang diperbarui</li>
            <li>Coba lagi nanti</li>
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

