<?php
namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use App\Models\PeminjamanFasilitas;
use App\Models\Warga;
use Illuminate\Http\Request;

class PeminjamanFasilitasController extends Controller
{
    public function index()
    {
        $datas = PeminjamanFasilitas::with(['fasilitas', 'warga'])->get();
        return view('guest.peminjaman.index', compact('datas'));
    }

    public function create()
    {
        $fasilitas = FasilitasUmum::all();
        $warga     = Warga::all();
        return view('guest.peminjaman.create', compact('fasilitas', 'warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id'    => 'required',
            'warga_id'        => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tujuan'          => 'required',
            'total_biaya'     => 'required|numeric',
            'bukti_bayar'     => 'nullable|mimes:jpg,png,pdf|max:2048',
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
        $data      = PeminjamanFasilitas::findOrFail($id);
        $fasilitas = FasilitasUmum::all();
        $warga     = Warga::all();

        return view('guest.peminjaman.edit', compact('data', 'fasilitas', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $data = PeminjamanFasilitas::findOrFail($id);

        $request->validate([
            'fasilitas_id'    => 'required',
            'warga_id'        => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tujuan'          => 'required',
            'total_biaya'     => 'required|numeric',
            'bukti_bayar'     => 'nullable|mimes:jpg,png,pdf|max:2048',
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
