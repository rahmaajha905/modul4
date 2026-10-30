<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan Banjir</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5e6d3;
            color: #4e342e;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fffaf3;
            padding: 25px;
            border-radius: 12px;
        }

        h1 {
            color: #795548;
        }

        a, button {
            display: inline-block;
            padding: 9px 14px;
            background: #795548;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 2px;
        }

        button {
            background: #a94442;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #d7b899;
        }

        .success {
            background: #e3f2df;
            color: #386641;
            padding: 12px;
            border-radius: 5px;
            margin-top: 15px;
        }

        .empty {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Daftar Laporan Banjir</h1>

        <!-- Tombol Tambah Laporan -->
        <a href="{{ route('laporan.create') }}">
            + Tambah Laporan
        </a>

        <!-- Pesan Berhasil -->
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Daftar Laporan -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Lokasi</th>
                    <th>Tinggi Genangan</th>
                    <th>Tanggal Kejadian</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($laporan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $item->nama_pelapor }}
                        </td>

                        <td>
                            {{ $item->lokasi }}
                        </td>

                        <td>
                            {{ $item->tinggi_genangan }} cm
                        </td>

                        <td>
                            {{ $item->tanggal_kejadian }}
                        </td>

                        <!-- Tombol Aksi -->
                        <td>
                            <a href="{{ route('laporan.show', $item->id) }}">
                                Detail
                            </a>

                            <a href="{{ route('laporan.edit', $item->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('laporan.destroy', $item->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                    Hapus
                                </button>

                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            Belum ada laporan banjir.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</body>
</html>
