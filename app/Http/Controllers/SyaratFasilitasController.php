<?php
namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use App\Models\Media;
use App\Models\SyaratFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SyaratFasilitasController extends Controller
{
    public function index()
    {
        $data = SyaratFasilitas::with('media')->get();
        return view('guest.syarat.index', compact('data'));
    }

    public function create()
    {
        $fasilitas = FasilitasUmum::all();
        return view('guest.syarat.create', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $syarat = SyaratFasilitas::create($request->only([
            'fasilitas_id',
            'nama_syarat',
            'deskripsi',
        ]));

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('syarat_media', 'public');

            Media::create([
                'ref_table' => 'syarat_fasilitas',
                'ref_id'    => $syarat->syarat_id,
                'file_url'  => $path,
                'mime_type' => $file->getMimeType(),
            ]);
        }

        return redirect()->route('syarat.index');
    }

    public function edit($id)
    {
        $syarat = SyaratFasilitas::with('media')->findOrFail($id);
        return view('guest.syarat.edit', compact('syarat'));
    }

    public function update(Request $request, $id)
    {
        $syarat = SyaratFasilitas::findOrFail($id);

        $syarat->update($request->only([
            'nama_syarat',
            'deskripsi',
        ]));

        if ($request->hasFile('foto')) {

            // hapus foto lama
            $old = $syarat->media()->first();
            if ($old) {
                Storage::disk('public')->delete($old->file_url);
                $old->delete();
            }

            // simpan foto baru
            $file = $request->file('foto');
            $path = $file->store('syarat_media', 'public');

            Media::create([
                'ref_table' => 'syarat_fasilitas',
                'ref_id'    => $syarat->syarat_id,
                'file_url'  => $path,
                'mime_type' => $file->getMimeType(),
            ]);
        }

        return redirect()->route('syarat.index');
    }

    public function destroy($id)
    {
        $syarat = SyaratFasilitas::findOrFail($id);

        // hapus media juga
        $media = $syarat->media()->first();
        if ($media) {
            Storage::disk('public')->delete($media->file_url);
            $media->delete();
        }

        $syarat->delete();

        return redirect()->route('syarat.index');
    }
}
