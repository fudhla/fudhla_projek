<?php

namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasUmumController extends Controller
{
    public function index()
    {
        
        $fasilitas = FasilitasUmum::latest()->paginate(10);
        return view('guest.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('guest.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'kapasitas' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // MENGUBAH: Menggunakan disk 'uploads_public' (sesuai config/filesystems.php)
            $validated['foto'] = $request->file('foto')->store('fasilitas', 'uploads_public');
        }

        FasilitasUmum::create($validated);
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(FasilitasUmum $fasilitas)
    {
        return view('guest.edit', compact('fasilitas'));
    }

    public function update(Request $request, FasilitasUmum $fasilitas)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'kapasitas' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($fasilitas->foto) {
                // MENGUBAH: Menghapus dari disk 'uploads_public'
                Storage::disk('uploads_public')->delete($fasilitas->foto);
            }
            // MENGUBAH: Menyimpan ke disk 'uploads_public'
            $validated['foto'] = $request->file('foto')->store('fasilitas', 'uploads_public');
        }

        $fasilitas->update($validated);
        return redirect()->route('fasilitas.index')->with('success', 'Data fasilitas berhasil diperbarui.');
    }

    public function destroy(FasilitasUmum $fasilitas)
    {
        if ($fasilitas->foto) {
            // MENGUBAH: Menghapus dari disk 'uploads_public'
            Storage::disk('uploads_public')->delete($fasilitas->foto);
        }
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Data fasilitas berhasil dihapus.');
    }
}
