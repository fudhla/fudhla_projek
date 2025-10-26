<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasUmum;

class FasilitasUmumController extends Controller
{
    /**
     * Menampilkan daftar fasilitas (index).
     */
    public function index()
    {
        $fasilitas = FasilitasUmum::all();
        return view('fasilitas_umum.index', compact('fasilitas'));
    }

    /**
     * Menampilkan form tambah fasilitas baru.
     */
    public function create()
    {
        return view('fasilitas_umum.create');
    }

    /**
     * Menyimpan data fasilitas baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'jenis'     => 'required|string|max:255',
            'alamat'    => 'required|string|max:255',
            'rt'        => 'required|string|max:10',
            'rw'        => 'required|string|max:10',
            'kapasitas' => 'required|numeric',
            'deskripsi' => 'required|string',
            'media'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Upload file jika ada
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/fasilitas', $filename, 'public');
            $validated['media'] = $path;
        }

        FasilitasUmum::create($validated);

        return redirect()->back()->with('success', 'Data fasilitas berhasil dikirim!');
    }

    /**
     * Menampilkan detail fasilitas.
     */
    public function show(string $id)
    {
        $fasilitas = FasilitasUmum::findOrFail($id);
        return view('fasilitas_umum.show', compact('fasilitas'));
    }

    /**
     * Menampilkan form edit fasilitas.
     */
    public function edit(string $id)
    {
        $fasilitas = FasilitasUmum::findOrFail($id);
        return view('fasilitas_umum.edit', compact('fasilitas'));
    }

    /**
     * Update data fasilitas.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'jenis'     => 'required|string|max:255',
            'alamat'    => 'required|string|max:255',
            'rt'        => 'required|string|max:10',
            'rw'        => 'required|string|max:10',
            'kapasitas' => 'required|numeric',
            'deskripsi' => 'required|string',
            'media'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $fasilitas = FasilitasUmum::findOrFail($id);

        // Upload file baru jika ada, hapus file lama
        if ($request->hasFile('media')) {
            if ($fasilitas->media && file_exists(storage_path('app/public/' . $fasilitas->media))) {
                unlink(storage_path('app/public/' . $fasilitas->media));
            }
            $file = $request->file('media');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/fasilitas', $filename, 'public');
            $validated['media'] = $path;
        }

        $fasilitas->update($validated);

        return redirect()->route('fasilitas.tampilan')->with('success', 'Data fasilitas berhasil diperbarui!');
    }

    /**
     * Hapus fasilitas.
     */
    public function destroy(string $id)
    {
        $fasilitas = FasilitasUmum::findOrFail($id);

        // Hapus file lama jika ada
        if ($fasilitas->media && file_exists(storage_path('app/public/' . $fasilitas->media))) {
            unlink(storage_path('app/public/' . $fasilitas->media));
        }

        $fasilitas->delete();

        return redirect()->back()->with('success', 'Data fasilitas berhasil dihapus!');
    }

    /**
     * Menampilkan semua data fasilitas di tampilan dashboard.
     */
    public function tampilan()
    {
        $fasilitas = FasilitasUmum::all();
        return view('fasilitas_umum.tampilan', compact('fasilitas'));
    }
}
