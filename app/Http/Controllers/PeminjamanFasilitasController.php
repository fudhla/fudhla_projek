<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanFasilitas;
use App\Models\Warga;
use Illuminate\Http\Request;

class PeminjamanFasilitasController extends Controller
{
    public function index(Request $request)
    {
        $peminjamans = PeminjamanFasilitas::with('warga')
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
        return view('guest.peminjaman.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tujuan' => 'required',
            'total_biaya' => 'required|numeric',
            'bukti_bayar' => 'nullable|mimes:jpg,png,pdf|max:2048',
            'status' => 'required|in:Pending,Disetujui,Ditolak',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti_bayar')) {
            $data['bukti_bayar'] = $request->file('bukti_bayar')->store('bukti_bayar', 'public');
        }

        PeminjamanFasilitas::create($data);

        return redirect()->route('pinjam.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $data = PeminjamanFasilitas::findOrFail($id);
        $warga = Warga::all();

        return view('guest.peminjaman.edit', compact('data', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $data = PeminjamanFasilitas::findOrFail($id);

        $request->validate([
            'warga_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tujuan' => 'required',
            'total_biaya' => 'required|numeric',
            'bukti_bayar' => 'nullable|mimes:jpg,png,pdf|max:2048',
            'status' => 'required|in:Pending,Disetujui,Ditolak',
        ]);

        $input = $request->all();

        if ($request->hasFile('bukti_bayar')) {
            $input['bukti_bayar'] = $request->file('bukti_bayar')->store('bukti_bayar', 'public');
        }

        $data->update($input);

        return redirect()->route('pinjam.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = PeminjamanFasilitas::findOrFail($id);
        $data->delete();

        return redirect()->route('pinjam.index')->with('success', 'Data berhasil dihapus');
    }
}
