<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:rooms',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        Room::create([
            'number' => $request->number,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'number' => 'required|unique:rooms,number,' . $room->id,
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        $room->update($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil diperbarui');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil dihapus');
    }
}
