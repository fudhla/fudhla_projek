<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasUmum;
use App\Models\Peminjaman;

class FormController extends Controller
{
    // Tampilkan form peminjaman
    public function create()
    {
        // Ambil semua fasilitas dari database
        $fasilitas = FasilitasUmum::all();

        // Tampilkan view form dengan data fasilitas
    return view('guest.form', compact('fasilitas'));
    }

    // Simpan data form peminjaman
    public function store(Request $request)
    {
        // Validasi input sesuai kebutuhan dan model fasilitas
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:50',
            'kontak' => 'required|string|max:20',
            'fasilitas_id' => 'required|exists:fasilitas_umum,fasilitas_id',
            'tujuan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'surat_permohonan' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        // Upload file surat permohonan
        $filePath = null;
        if ($request->hasFile('surat_permohonan')) {
            $filePath = $request->file('surat_permohonan')->store('surat_permohonan', 'public');
        }

        // Simpan ke tabel peminjaman
        Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'no_ktp' => $request->no_ktp,
            'kontak' => $request->kontak,
            'fasilitas_id' => $request->fasilitas_id,
            'tujuan' => $request->tujuan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'surat_permohonan' => $filePath,
            'keterangan' => $request->keterangan,
            'status' => 'pending', // default status pengajuan
        ]);

        return redirect()->route('fasilitas.create')->with('success', 'Pengajuan berhasil dikirim!');
    }
}


