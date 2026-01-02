<?php
namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use App\Models\PetugasFasilitas;
use App\Models\Warga;
use Illuminate\Http\Request;

class PetugasFasilitasController extends Controller
{
    public function index()
    {
        $data = PetugasFasilitas::all();
        return view('guest.petugas.index', compact('data'));
    }

    public function create()
    {
        $fasilitas = FasilitasUmum::all();
        $warga     = Warga::all();

        // Anda harus menambahkan compact agar variabel sampai ke view
        return view('guest.petugas.create', compact('fasilitas', 'warga'));
    }

    public function store(Request $request)
    {
        PetugasFasilitas::create($request->all());
        return redirect()->route('petugas.index');
    }

    public function edit($id)
    {
        // Ambil data petugas berdasarkan id
        $petugas = PetugasFasilitas::findOrFail($id);

        // Ambil semua fasilitas dan warga untuk dropdown
        $fasilitas = FasilitasUmum::all();
        $warga     = Warga::all();

        // Kirim semua data ke view
        return view('guest.petugas.edit', compact('petugas', 'fasilitas', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $data = PetugasFasilitas::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('petugas.index');
    }

    public function destroy($id)
    {
        PetugasFasilitas::destroy($id);
        return redirect()->route('petugas.index');
    }
}
