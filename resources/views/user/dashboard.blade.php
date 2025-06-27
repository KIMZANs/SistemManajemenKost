@extends('layouts.user')

@section('title', 'Dashboard Penghuni Kost')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Halo, {{ auth()->user()->name }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <p>Selamat datang di sistem manajemen kost!</p>
            <p>Silakan pilih menu di sidebar untuk melanjutkan.</p>
        </div>
    </div>
@endsection
