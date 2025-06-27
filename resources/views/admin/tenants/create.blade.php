@extends('layouts.master')

@section('title', 'Tambah Penghuni')

@section('content')
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Penghuni Kost</h3>
            </div>

            <form action="{{ route('admin.tenants.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    {{-- User --}}
                    <div class="form-group">
                        <label for="user_id">Pilih User</label>
                        <select name="user_id" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Room --}}
                    <select name="room_id" class="form-control" required>
                        <option value="">-- Pilih Kamar --</option>
                        @forelse ($rooms as $room)
                            <option value="{{ $room->id }}">Kamar {{ $room->number }}</option>
                        @empty
                            <option disabled>Tidak ada kamar tersedia</option>
                        @endforelse
                    </select>

                    {{-- Nama --}}
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama">
                    </div>

                    {{-- Nomor Kamar --}}
                    <div class="form-group">
                        <label for="no_kamar">Nomor Kamar</label>
                        <input type="text" name="no_kamar" class="form-control" required placeholder="Contoh: A01">
                    </div>

                    {{-- Nomor HP --}}
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" required
                            placeholder="Contoh: 08123456789">
                    </div>

                    {{-- Alamat --}}
                    <div class="form-group">
                        <label for="alamat">Alamat (Opsional)</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat lengkap (opsional)"></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.tenants.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
