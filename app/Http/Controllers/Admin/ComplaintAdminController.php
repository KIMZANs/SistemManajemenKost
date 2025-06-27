<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintAdminController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('user')->latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function edit(Complaint $komplain)
    {
        return view('admin.complaints.edit', compact('komplain'));
    }

    public function update(Request $request, Complaint $komplain)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Sedang Diperbaiki,Selesai'
        ]);

        $komplain->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.komplain.index')->with('success', 'Status komplain berhasil diperbarui.');
    }
}
