<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LaporBanjir - Form Laporan</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    <div class="card">

        <h1>Lapor Banjir</h1>

        <p class="subtitle">
            Laporkan kejadian banjir di wilayah Anda
            agar penanganan dapat dilakukan dengan cepat.
        </p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('laporan.proses') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <label for="nama_pelapor">Nama Pelapor</label>
            <input
                type="text"
                id="nama_pelapor"
                name="nama_pelapor"
                placeholder="Masukkan nama lengkap"
                value="{{ old('nama_pelapor') }}"
                required
            >

            <label for="no_hp">Nomor HP</label>
            <input
                type="text"
                id="no_hp"
                name="no_hp"
                placeholder="Masukkan nomor HP"
                value="{{ old('no_hp') }}"
                required
            >

            <label for="lokasi">Lokasi Kejadian</label>
            <input
                type="text"
                id="lokasi"
                name="lokasi"
                placeholder="Contoh: Desa Jayagiri"
                value="{{ old('lokasi') }}"
                required
            >

            <label for="kecamatan">Kecamatan</label>
            <input
                type="text"
                id="kecamatan"
                name="kecamatan"
                placeholder="Contoh: Lembang"
                value="{{ old('kecamatan') }}"
                required
            >

            <label for="tinggi_genangan">Tinggi Genangan Air (cm)</label>
            <input
                type="number"
                id="tinggi_genangan"
                name="tinggi_genangan"
                placeholder="Contoh: 50"
                min="0"
                value="{{ old('tinggi_genangan') }}"
                required
            >

            <label for="keterangan">Keterangan</label>
            <textarea
                id="keterangan"
                name="keterangan"
                placeholder="Jelaskan kondisi banjir di lokasi">{{ old('keterangan') }}</textarea>

            <label for="foto">Foto Kejadian</label>
            <input
                type="file"
                id="foto"
                name="foto"
                accept="image/*"
            >

            <label for="tanggal_kejadian">Tanggal Kejadian</label>
            <input
                type="date"
                id="tanggal_kejadian"
                name="tanggal_kejadian"
                value="{{ old('tanggal_kejadian') }}"
                required
            >

            <button type="submit">
                Kirim Laporan
            </button>

        </form>

        <p style="text-align: center; margin-top: 20px;">
            <a href="{{ route('laporan.index') }}">
                Lihat Daftar Laporan
            </a>
        </p>

    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const konfirmasi = confirm('Apakah data laporan sudah benar?');

        if (!konfirmasi) {
            event.preventDefault();
        }
    });
</script>

</body>
</html>
