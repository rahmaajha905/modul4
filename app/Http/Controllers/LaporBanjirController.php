<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporBanjirController extends Controller
{
    // Menampilkan form laporan
    public function index()
    {
        return view('data');
    }

    // Menampilkan daftar laporan
    public function laporan()
    {
        $laporan = Laporan::latest()->get();

        return view('laporan.index', compact('laporan'));
    }

    // Menyimpan laporan dari form utama
    public function proses(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'lokasi' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'tinggi_genangan' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'tanggal_kejadian' => 'required|date',
        ]);

        // Menyimpan foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('foto-laporan', 'public');
        }

        // Status awal laporan
        $data['status'] = 'Menunggu';

        // Menyimpan data ke database
        Laporan::create($data);

        // Kembali ke halaman daftar laporan
        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim!');
    }
}
