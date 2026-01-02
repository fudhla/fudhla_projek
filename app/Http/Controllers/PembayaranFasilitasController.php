<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PembayaranFasilitas;
use App\Models\PeminjamanFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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
        $request->validate([
            'pinjam_id' => 'required',
            'tanggal'   => 'required|date',
            'jumlah'    => 'required|numeric',
            'metode'    => 'required',
            'images.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // SIMPAN PEMBAYARAN
        $pembayaran = PembayaranFasilitas::create([
            'pinjam_id'  => $request->pinjam_id,
            'tanggal'    => $request->tanggal,
            'jumlah'     => $request->jumlah,
            'metode'     => $request->metode,
            'keterangan' => $request->keterangan,
        ]);

        // ==========================
        // SIMPAN FOTO KE TABEL MEDIA
        // ==========================
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {

                $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();

                // simpan ke storage
                $file->storeAs('public/pembayaran_media', $fileName);

                Media::create([
                    'ref_table'  => 'pembayaran_fasilitas',
                    'ref_id'     => $pembayaran->bayar_id,
                    'file_url'   => 'pembayaran_media/' . $fileName,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil disimpan');
    }

    public function edit($id)
    {
        $pembayaran = PembayaranFasilitas::with('media')
            ->where('bayar_id', $id)
            ->firstOrFail();

        return view('guest.pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = PembayaranFasilitas::findOrFail($id);

        $pembayaran->update([
            'tanggal'    => $request->tanggal,
            'jumlah'     => $request->jumlah,
            'metode'     => $request->metode,
            'keterangan' => $request->keterangan,
        ]);

        // JIKA UPLOAD FOTO BARU
        if ($request->hasFile('images')) {

            // hapus foto lama
            foreach ($pembayaran->media as $media) {
                Storage::delete('public/' . $media->file_url);
                $media->delete();
            }

            // simpan foto baru
            foreach ($request->file('images') as $index => $file) {
                $fileName = time() . '_' . Str::random(6) . '.' . $file->extension();
                $file->storeAs('public/pembayaran_media', $fileName);

                Media::create([
                    'ref_table'  => 'pembayaran_fasilitas',
                    'ref_id'     => $pembayaran->bayar_id,
                    'file_url'   => 'pembayaran_media/' . $fileName,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        PembayaranFasilitas::destroy($id);
        return redirect()->route('pembayaran.index');
    }
}
