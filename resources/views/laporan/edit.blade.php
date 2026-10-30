
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan Banjir</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5e6d3;
            color: #4e342e;
            padding: 30px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: #fffaf3;
            padding: 25px;
            border-radius: 12px;
        }

        h1 {
            color: #795548;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 7px;
            box-sizing: border-box;
            border: 1px solid #c9b29b;
            border-radius: 5px;
        }

        button, a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #795548;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        img {
            max-width: 200px;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Edit Laporan Banjir</h1>

    <form action="{{ route('laporan.update', $laporan->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label>Nama Pelapor</label>
        <input type="text" name="nama_pelapor"
               value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}" required>

        <label>Nomor HP</label>
        <input type="text" name="no_hp"
               value="{{ old('no_hp', $laporan->no_hp) }}" required>

        <label>Lokasi Kejadian</label>
        <input type="text" name="lokasi"
               value="{{ old('lokasi', $laporan->lokasi) }}" required>

        <label>Kecamatan</label>
        <input type="text" name="kecamatan"
               value="{{ old('kecamatan', $laporan->kecamatan) }}" required>

        <label>Tinggi Genangan (cm)</label>
        <input type="number" name="tinggi_genangan"
               value="{{ old('tinggi_genangan', $laporan->tinggi_genangan) }}"
               min="0" required>

        <label>Keterangan</label>
        <textarea name="keterangan" rows="4">{{ old('keterangan', $laporan->keterangan) }}</textarea>

        <label>Foto Kejadian</label>

        @if($laporan->foto)
            <img src="{{ asset('storage/' . $laporan->foto) }}"
                 alt="Foto laporan">
        @endif

        <input type="file" name="foto" accept="image/*">

        <label>Tanggal Kejadian</label>
        <input type="date" name="tanggal_kejadian"
               value="{{ old('tanggal_kejadian', $laporan->tanggal_kejadian) }}"
               required>

        <label>Status Laporan</label>
        <select name="status" required>
            <option value="Menunggu"
                {{ $laporan->status == 'Menunggu' ? 'selected' : '' }}>
                Menunggu
            </option>

            <option value="Diproses"
                {{ $laporan->status == 'Diproses' ? 'selected' : '' }}>
                Diproses
            </option>

            <option value="Selesai"
                {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>
                Selesai
            </option>
        </select>

        <button type="submit">Simpan Perubahan</button>

        <a href="{{ route('laporan.index') }}">Kembali</a>

    </form>

</div>
</body>
</html>
