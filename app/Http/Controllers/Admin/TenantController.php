<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with('user', 'room')->latest()->get();
        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get(); // ambil user biasa
        $rooms = Room::all(); // ambil semua kamar dari database
        return view('admin.tenants.create', compact('users', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'nama' => 'required|string|max:255',
            'no_kamar' => 'required|string|max:10',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'nullable|string|max:255',
        ]);

        Tenant::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'nama' => $request->nama,
            'no_kamar' => $request->no_kamar,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.tenants.index')->with('success', 'Penghuni berhasil ditambahkan.');
    }

    public function show(Tenant $tenant)
    {
        return view('admin.tenants.show', compact('tenant'));
    }

    public function edit(Tenant $tenant)
    {
        $users = User::where('role', 'user')->get();
        $rooms = Room::all(); // Ambil semua kamar
        return view('admin.tenants.edit', compact('tenant', 'users', 'rooms'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'nama' => 'required|string|max:255',
            'no_kamar' => 'required|string|max:10',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'nullable|string|max:255',
        ]);

        $tenant->update([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'nama' => $request->nama,
            'no_kamar' => $request->no_kamar,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.tenants.index')->with('success', 'Penghuni berhasil diupdate.');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('admin.tenants.index')->with('success', 'Penghuni dihapus.');
    }
}
