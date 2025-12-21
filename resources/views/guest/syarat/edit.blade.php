@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h3>Edit Syarat</h3>

    <form action="{{ route('syarat.update', $syarat->syarat_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Syarat</label>
            <input type="text" name="nama_syarat" value="{{ $syarat->nama_syarat }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $syarat->deskripsi }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
