@extends('layouts.user')

@section('title', 'Upload Bukti Pembayaran')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Upload Bukti Pembayaran</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.payments.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <input type="text" name="bulan" id="bulan" class="form-control" placeholder="contoh: Juni 2025"
                        required>
                    @error('bulan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bukti_bayar">Bukti Pembayaran</label>
                    <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control-file" required>
                    @error('bukti_bayar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Upload</button>
                <a href="{{ route('user.payments.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
