<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Menampilkan daftar pembayaran milik user yang sedang login.
     */
    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())->latest()->get();
        return view('user.payments.index', compact('payments'));
    }

    /**
     * Menampilkan form untuk mengunggah bukti pembayaran baru.
     */
    public function create()
    {
        return view('user.payments.create');
    }

    /**
     * Menyimpan bukti pembayaran ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string',
            'bukti_bayar' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Simpan file ke storage/public/bukti_bayar
        $path = $request->file('bukti_bayar')->store('bukti_bayar', 'public');

        Payment::create([
            'user_id' => Auth::id(),
            'bulan' => $request->bulan,
            'bukti_bayar' => $path,
            'status' => 'Menunggu Konfirmasi'
        ]);

        return redirect()->route('user.payments.index')
            ->with('success', 'Bukti pembayaran berhasil dikirim.');
    }
}
