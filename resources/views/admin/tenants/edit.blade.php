@extends('layouts.master')

@section('content')
    <div class="container">
        <h4>Edit Penghuni Kost</h4>

        <form method="POST" action="{{ route('admin.tenants.update', $tenant) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>User (Akun Penghuni)</label>
                <select name="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $tenant->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Penghuni</label>
                <input type="text" name="nama" class="form-control" value="{{ $tenant->nama }}" required>
            </div>

            <div class="mb-3">
                <label>No. Kamar</label>
                <input type="text" name="no_kamar" class="form-control" value="{{ $tenant->no_kamar }}" required>
            </div>

            <div class="mb-3">
                <label>No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $tenant->no_hp }}" required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $tenant->alamat }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
            <a href="{{ route('admin.tenants.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
