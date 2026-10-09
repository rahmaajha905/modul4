<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Laporan Banjir</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .success-icon {
            width: 65px;
            height: 65px;
            background: #f0e0d0;
            color: #795548;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        .section-title {
            color: #795548;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .hasil p {
            margin-bottom: 8px;
        }

        .footer {
            text-align: center;
            color: #a1887f;
            font-size: 12px;
            margin-top: 22px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">

            <div class="success-icon">✓</div>

            <h1>Laporan Berhasil!</h1>

            <p class="subtitle">
                Terima kasih telah melaporkan kejadian banjir.
                Data laporan kamu berhasil disimpan.
            </p>

            <h2 class="section-title">Detail Laporan</h2>

            <div class="hasil">
                <p>
                    <strong>Nama Pelapor:</strong><br>
                    {{ $data['nama_pelapor'] }}
                </p>

                <p>
                    <strong>Lokasi Kejadian:</strong><br>
                    {{ $data['lokasi'] }}
                </p>

                <p>
                    <strong>Tinggi Genangan:</strong><br>
                    {{ $data['tinggi_genangan'] }} cm
                </p>

                <p>
                    <strong>Tanggal Kejadian:</strong><br>
                    {{ $data['tanggal_kejadian'] }}
                </p>
            </div>

            <a href="{{ route('form') }}" class="button">
                Kembali ke Form
            </a>

            <p class="footer">
                Sistem Informasi Laporan Banjir
            </p>

        </div>
    </div>
</body>
</html>