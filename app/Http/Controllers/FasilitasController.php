<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = [
            [
                'nama' => 'Balai Desa Sukamaju',
                'jenis' => 'Aula Serbaguna',
                'kapasitas' => 200,
                'deskripsi' => 'Tempat pertemuan warga dan kegiatan resmi.'
            ],
            [
                'nama' => 'Lapangan Desa',
                'jenis' => 'Olahraga',
                'kapasitas' => 500,
                'deskripsi' => 'Lapangan serbaguna untuk sepak bola dan upacara.'
            ]
        ];

        return view('fasilitas', compact('fasilitas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
