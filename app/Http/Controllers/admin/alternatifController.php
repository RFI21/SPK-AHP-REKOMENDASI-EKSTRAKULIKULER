<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alternatif;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    public function index()
    {
        $data = alternatif::all();
        return view('admin.alternatif.index', compact('data'));
    }

    public function create()
    {
        return view('admin.alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Upload gambar
        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('alternatif', 'public');
        }

        // Simpan data
        alternatif::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('alternatif.index')->with('success', 'alternatif berhasil ditambahkan');
    }

    public function edit($id)
    {
        $alternatif = alternatif::findOrFail($id);
        return view('admin.alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $alternatif = alternatif::findOrFail($id);

        // Data update
        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($alternatif->gambar && Storage::disk('public')->exists($alternatif->gambar)) {
                Storage::disk('public')->delete($alternatif->gambar);
            }

            // Upload gambar baru
            $data['gambar'] = $request->file('gambar')->store('alternatif', 'public');
        }

        $alternatif->update($data);

        return redirect()
            ->route('alternatif.index')
            ->with('success', 'Alternatif berhasil diperbarui');
            
            
    }

    public function destroy($id)
    {
        $alternatif = alternatif::findOrFail($id);
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success', 'alternatif berhasil dihapus');
    }
}
