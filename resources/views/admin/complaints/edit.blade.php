@extends('layouts.master')

@section('title', 'Edit Komplain')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Status Komplain</h1>

        <form action="{{ route('admin.komplain.update', $komplain->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Isi Komplain</label>
                <textarea class="form-control" readonly>{{ $komplain->isi }}</textarea>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="Menunggu" {{ $komplain->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Sedang Diperbaiki" {{ $komplain->status == 'Sedang Diperbaiki' ? 'selected' : '' }}>
                        Sedang Diperbaiki</option>
                    <option value="Selesai" {{ $komplain->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.komplain.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
