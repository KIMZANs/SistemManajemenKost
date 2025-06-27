@extends('layouts.master')

@section('title', 'Tagihan Bulan Ini')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Daftar Tagihan Bulan {{ \Carbon\Carbon::parse($bulanIni)->translatedFormat('F Y') }}</h1>

        <form method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">-- Semua Status --</option>
                        <option value="unpaid" {{ $status == 'unpaid' ? 'selected' : '' }}>Belum Bayar</option>
                        <option value="paid" {{ $status == 'paid' ? 'selected' : '' }}>Sudah Bayar</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Penghuni</th>
                            <th>Email</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bills as $bill)
                            <tr>
                                <td>{{ $bill->tenant->user->name ?? '-' }}</td>
                                <td>{{ $bill->tenant->user->email ?? '-' }}</td>
                                <td>Rp {{ number_format($bill->amount, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge badge-{{ $bill->status == 'paid' ? 'success' : 'danger' }}">
                                        {{ ucfirst($bill->status) }}
                                    </span>
                                </td>
                                <td>{{ $bill->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada tagihan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $bills->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
