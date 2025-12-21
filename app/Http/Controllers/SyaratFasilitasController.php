<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasUmum;
use App\Models\SyaratFasilitas;

class SyaratFasilitasController extends Controller
{
    public function index()
    {
        $data = SyaratFasilitas::all();
        return view('guest.syarat.index', compact('data'));
    }

    public function create()
{
    // Mengambil semua data fasilitas agar bisa dipilih di dropdown
    $fasilitas = FasilitasUmum::all();

    // Kirim variabel ke view menggunakan compact
    return view('guest.syarat.create', compact('fasilitas'));
}

    public function store(Request $request)
    {
        SyaratFasilitas::create($request->all());
        return redirect()->route('syarat.index');
    }

    public function edit($id)
    {
        $data = SyaratFasilitas::findOrFail($id);
        return view('guest.syarat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SyaratFasilitas::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('syarat.index');
    }

    public function destroy($id)
    {
        SyaratFasilitas::destroy($id);
        return redirect()->route('syarat.index');
    }
}

