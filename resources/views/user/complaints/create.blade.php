@extends('layouts.user')

@section('title', 'Buat Komplain')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Buat Komplain Baru</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.complaints.store') }}">
                @csrf

                <div class="form-group">
                    <label for="isi">Isi Komplain</label>
                    <textarea name="isi" id="isi" class="form-control" rows="4" required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Kirim Komplain</button>
                <a href="{{ route('user.complaints.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
