@extends('layouts.user')

@section('title', 'Riwayat Pembayaran')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>💰 Riwayat Pembayaran</h4>
        <a href="{{ route('user.payments.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Pembayaran
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Bulan</th>
                <th>Bukti Bayar</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->bulan }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $payment->bukti_bayar) }}" target="_blank">Lihat</a>
                    </td>
                    <td><span class="badge badge-info">{{ $payment->status }}</span></td>
                    <td>{{ $payment->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
