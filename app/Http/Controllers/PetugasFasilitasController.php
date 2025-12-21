<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\FasilitasUmum;
use App\Models\PetugasFasilitas;

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
        $data = PetugasFasilitas::findOrFail($id);
        return view('guest.petugas.edit', compact('data'));
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
