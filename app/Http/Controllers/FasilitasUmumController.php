<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = FasilitasUmum::all();
        return view('fasilitas_umum.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fasilitas_umum.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'jenis'     => 'required',
            'alamat'    => 'required',
            'rt'        => 'required',
            'rw'        => 'required',
            'kapasitas' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        FasilitasUmum::create($validated);

        return redirect()->back()->with('success', 'Data fasilitas berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
