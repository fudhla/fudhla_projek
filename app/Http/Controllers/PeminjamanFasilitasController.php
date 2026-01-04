<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PeminjamanFasilitas;
use App\Models\Warga;
use App\Models\FasilitasUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeminjamanFasilitasController extends Controller
{
    public function index(Request $request)
    {
        $peminjamans = PeminjamanFasilitas::with(['warga', 'media', 'fasilitas'])
            ->when($request->search, function ($q) use ($request) {
                $q->whereHas('warga', function ($w) use ($request) {
                    $w->where('nama', 'like', '%' . $request->search . '%')
                      ->orWhere('nik', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->latest()
            ->paginate(9);

        return view('guest.peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $warga = Warga::all();
        $fasilitas = FasilitasUmum::all();

        return view('guest.peminjaman.create', compact('warga', 'fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id'    => 'required|exists:fasilitas_umum,fasilitas_id',
            'warga_id'        => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tujuan'          => 'required',
            'total_biaya'     => 'required|numeric',
            'bukti_bayar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pinjam = PeminjamanFasilitas::create([
            'fasilitas_id'    => $request->fasilitas_id,
            'warga_id'        => $request->warga_id,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tujuan'          => $request->tujuan,
            'total_biaya'     => $request->total_biaya,
            'status'          => 'Pending',
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $path = $file->store('bukti_bayar', 'public');

            Media::create([
                'ref_table' => 'peminjaman_fasilitas',
                'ref_id'    => $pinjam->pinjam_id,
                'file_url'  => $path,
                'mime_type' => $file->getMimeType(),
            ]);
        }

        return redirect()->route('pinjam.index')->with('success', 'Peminjaman berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fasilitas_id'    => 'required|exists:fasilitas_umum,fasilitas_id',
            'warga_id'        => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tujuan'          => 'required',
            'total_biaya'     => 'required|numeric',
            'bukti_bayar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pinjam = PeminjamanFasilitas::findOrFail($id);

        $pinjam->update([
            'fasilitas_id'    => $request->fasilitas_id,
            'warga_id'        => $request->warga_id,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tujuan'          => $request->tujuan,
            'total_biaya'     => $request->total_biaya,
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $oldMedia = Media::where('ref_table', 'peminjaman_fasilitas')
                ->where('ref_id', $pinjam->pinjam_id)
                ->get();

            foreach ($oldMedia as $media) {
                Storage::disk('public')->delete($media->file_url);
                $media->delete();
            }

            $file = $request->file('bukti_bayar');
            $path = $file->store('bukti_bayar', 'public');

            Media::create([
                'ref_table' => 'peminjaman_fasilitas',
                'ref_id'    => $pinjam->pinjam_id,
                'file_url'  => $path,
                'mime_type' => $file->getMimeType(),
            ]);
        }

        return redirect()->route('pinjam.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function show($id)
    {
        $data = PeminjamanFasilitas::with(['media', 'warga', 'fasilitas'])->findOrFail($id);
        return view('guest.peminjaman.detail', compact('data'));
    }

    public function destroy($id)
    {
        PeminjamanFasilitas::findOrFail($id)->delete();
        return redirect()->route('pinjam.index')->with('success', 'Data berhasil dihapus');
    }
}
