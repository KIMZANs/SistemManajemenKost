@extends('layouts.master')
@section('title', 'Manajemen Kamar')

@section('content')
    <div class="container">
        <h1 class="mb-4">Data Kamar</h1>

        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">+ Tambah Kamar</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No Kamar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->number }}</td>
                        <td>{{ ucfirst($room->status) }}</td>
                        <td>
                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus kamar ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
