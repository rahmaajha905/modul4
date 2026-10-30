
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan Banjir</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background-color: #f5e6d3;
            color: #4e342e;
        }

        .container {
            max-width: 750px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #795548;
            margin-bottom: 25px;
        }

        .card {
            background-color: #fffaf3;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .detail {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ead8c5;
        }

        .detail strong {
            display: inline-block;
            width: 180px;
        }

        .foto {
            max-width: 100%;
            width: 350px;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #795548;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background-color: #5d4037;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Detail Laporan Banjir</h2>

    <div class="card">

        <div class="detail">
            <strong>Nama Pelapor</strong>
            : {{ $laporan->nama_pelapor }}
        </div>

        <div class="detail">
            <strong>Nomor HP</strong>
            : {{ $laporan->no_hp }}
        </div>

        <div class="detail">
            <strong>Lokasi</strong>
            : {{ $laporan->lokasi }}
        </div>

        <div class="detail">
            <strong>Kecamatan</strong>
            : {{ $laporan->kecamatan }}
        </div>

        <div class="detail">
            <strong>Tinggi Genangan</strong>
            : {{ $laporan->tinggi_genangan }} cm
        </div>

        <div class="detail">
            <strong>Tanggal Kejadian</strong>
            : {{ $laporan->tanggal_kejadian }}
        </div>

        <div class="detail">
            <strong>Keterangan</strong>
            : {{ $laporan->keterangan ?? '-' }}
        </div>

        <div class="detail">
            <strong>Status</strong>
            : {{ $laporan->status }}
        </div>

        @if ($laporan->foto)
            <div>
                <strong>Foto Laporan:</strong>
                <br>

                <img
                    src="{{ asset('storage/' . $laporan->foto) }}"
                    alt="Foto laporan banjir"
                    class="foto"
                >
            </div>
        @else
            <p><strong>Foto Laporan:</strong> Tidak ada foto</p>
        @endif

        <a href="{{ route('laporan.index') }}" class="btn">
            Kembali ke Daftar Laporan
        </a>

    </div>

</div>

</body>
</html>
