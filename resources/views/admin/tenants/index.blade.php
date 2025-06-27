@extends('layouts.master') {{-- layout AdminLTE kamu --}}

@section('content')
    <div class="container">
        <h4>Daftar Penghuni Kost</h4>

        <a href="{{ route('admin.tenants.create') }}" class="btn btn-primary mb-3">Tambah Penghuni</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. Kamar</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->nama }}</td>
                        <td>{{ $tenant->no_kamar }}</td>
                        <td>{{ $tenant->no_hp }}</td>
                        <td>{{ $tenant->alamat }}</td>
                        <td>
                            <a href="{{ route('admin.tenants.edit', $tenant) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.tenants.destroy', $tenant) }}"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
