@extends('layouts.master')
@section('title', 'Tambah Kamar')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Kamar Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.rooms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">No Kamar</label>
                <input type="text" name="number" id="number" class="form-control" required placeholder="Contoh: A01">
            </div>

            <div class="form-group">
                <label for="status">Status Kamar</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="available">Tersedia</option>
                    <option value="occupied">Terisi</option>
                    <option value="maintenance">Perbaikan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
@endsection
