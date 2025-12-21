<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranFasilitas;
use App\Models\PeminjamanFasilitas;

class PembayaranFasilitasController extends Controller
{
    public function index()
{
    $pembayaran = PembayaranFasilitas::all();

    return view('guest.pembayaran.index', compact('pembayaran'));
}

    public function create()
{
    $peminjaman = PeminjamanFasilitas::all();

    // Tambahkan compact('peminjaman') agar data dikirim ke blade
    return view('guest.pembayaran.create', compact('peminjaman'));
}

    public function store(Request $request)
    {
        PembayaranFasilitas::create($request->all());
        return redirect()->route('pembayaran.index');
    }

    public function edit($id)
    {
        $data = PembayaranFasilitas::findOrFail($id);
        return view('guest.pembayaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PembayaranFasilitas::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('pembayaran.index');
    }

    public function destroy($id)
    {
        PembayaranFasilitas::destroy($id);
        return redirect()->route('pembayaran.index');
    }
}
