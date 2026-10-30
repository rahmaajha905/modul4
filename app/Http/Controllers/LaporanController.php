<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->get();

        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
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

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('foto-laporan', 'public');
        }

        $data['status'] = 'Menunggu';

        Laporan::create($data);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('laporan.show', compact('laporan'));
    }

    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, string $id)
    {
        $laporan = Laporan::findOrFail($id);

        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'lokasi' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'tinggi_genangan' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'tanggal_kejadian' => 'required|date',
            'status' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('foto-laporan', 'public');
        } else {
            unset($data['foto']);
        }

        $laporan->update($data);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus!');
    }
}
