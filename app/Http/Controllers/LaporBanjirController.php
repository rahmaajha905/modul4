<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporBanjirController extends Controller
{
    public function index()
    {
        return view('data');
    }

    public function laporan()
    {
        $laporan = Laporan::all();

        return view('laporan.index', compact('laporan'));
    }

    public function proses(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tinggi_genangan' => 'required|integer|min:0',
            'tanggal_kejadian' => 'required|date',
        ]);

        Laporan::create($data);

        return view('laporan.konfirmasi', compact('data'));
    }
}

