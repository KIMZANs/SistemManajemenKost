@extends('layouts.master')
@section('title', 'Edit Kamar')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Kamar</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>No Kamar</label>
                <input type="text" name="number" class="form-control" value="{{ $room->number }}" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="occupied" {{ $room->status == 'occupied' ? 'selected' : '' }}>Terisi</option>
                    <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Perbaikan</option>
                </select>
            </div>
            <button class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
@endsection
