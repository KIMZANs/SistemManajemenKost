@extends('layouts.user')

@section('title', 'Daftar Komplain')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>📢 Daftar Komplain Anda</h4>
        <a href="{{ route('user.complaints.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Buat Komplain Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Isi Komplain</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($complaints as $index => $complaint)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $complaint->isi }}</td>
                    <td><span class="badge badge-info">{{ $complaint->status }}</span></td>
                    <td>{{ $complaint->created_at->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada komplain.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
