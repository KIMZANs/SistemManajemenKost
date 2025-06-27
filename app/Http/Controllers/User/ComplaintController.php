<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Menampilkan daftar komplain milik user yang sedang login.
     */
    public function index()
    {
        $complaints = Complaint::where('user_id', Auth::id())->latest()->get();
        return view('user.complaints.index', compact('complaints'));
    }

    /**
     * Menampilkan form untuk mengirim komplain baru.
     */
    public function create()
    {
        return view('user.complaints.create');
    }

    /**
     * Menyimpan data komplain ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required|string'
        ]);

        Complaint::create([
            'user_id' => Auth::id(),
            'isi' => $request->isi,
            'status' => 'Menunggu'
        ]);

        return redirect()->route('user.complaints.index')
            ->with('success', 'Komplain berhasil dikirim.');
    }
}
