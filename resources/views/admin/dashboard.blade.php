@extends('layouts.master')

@section('title', 'Dashboard Admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Dashboard Admin</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Kamar Terisi -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $jumlahKamarTerisi }}</h3>
                        <p>Kamar Terisi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bed"></i>
                    </div>
                </div>
            </div>

            <!-- Kamar Kosong -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $jumlahKamarKosong }}</h3>
                        <p>Kamar Kosong</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                </div>
            </div>

            <!-- Komplain Baru -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $jumlahKomplainBaru }}</h3>
                        <p>Komplain Baru</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-comments"></i>
                    </div>
                </div>
            </div>

            <!-- Penghuni Belum Bayar -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $penghuniBelumBayar }}</h3>
                        <p>Belum Bayar Bulan Ini</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
