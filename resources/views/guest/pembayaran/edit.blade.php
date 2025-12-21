@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Pembayaran</h3>

    <form action="{{ route('pembayaran.update', $pembayaran->bayar_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $pembayaran->tanggal }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ $pembayaran->jumlah }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Metode</label>
            <input type="text" name="metode" value="{{ $pembayaran->metode }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pembayaran->keterangan }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
