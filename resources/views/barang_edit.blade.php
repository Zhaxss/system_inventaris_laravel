<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@section('title', 'Halaman Edit Barang')

@section('konten')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">Anda Mengedit Barang : {{ $barang->nama_barang }}</div>
                <div class="card-body">
                    <form action="/manajemen_barang/edit/submit/{{ $barang->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                value="{{ $barang->nama_barang }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                value="{{ $barang->jumlah }}" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe Barang</label>
                            <input type="text" class="form-control" name="tipe" id="tipe"
                                value="{{ $barang->tipe }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini</label><br>
                            <img id="preview" src="{{ asset('uploads/' . $barang->gambar) }}" alt="gambar barang"
                                class="img-thumbnail mb-2" width="120">

                            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="/manajemen_barang" class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const inputGambar = document.getElementById('gambar');
        const preview = document.getElementById('preview');

        inputGambar.addEventListener('change', function() {
            const [file] = this.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        });
    </script>
