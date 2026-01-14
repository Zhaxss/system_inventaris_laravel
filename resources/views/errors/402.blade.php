@include('errors.layout', [
    'code' => 402,
    'title' => 'Payment Required',
    'message' => 'Halaman ini memerlukan pembayaran untuk diakses.',
    'icon' => '<svg class="w-12 h-12 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.567-3 3.5S10.343 15 12 15s3-1.567 3-3.5S13.657 8 12 8zm0 0V4m0 14v2m9-10v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6"/></svg>'
])
