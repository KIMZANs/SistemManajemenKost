@extends('layouts.master')

@section('title', 'Daftar Komplain')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Daftar Komplain</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Isi Komplain</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complaints as $komplain)
                    <tr>
                        <td>{{ $komplain->user->name }}</td>
                        <td>{{ $komplain->isi }}</td>
                        <td><span class="badge badge-info">{{ $komplain->status }}</span></td>
                        <td>
                            <a href="{{ route('admin.komplain.edit', $komplain->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
