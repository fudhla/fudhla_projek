@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h3>Edit Petugas</h3>

    <form action="{{ route('petugas.update', $petugas->petugas_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Peran</label>
            <input type="text" name="peran" value="{{ $petugas->peran }}" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
