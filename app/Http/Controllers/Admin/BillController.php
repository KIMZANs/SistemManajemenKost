<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $bulanIni = now()->format('Y-m');
        $status = $request->get('status'); // Optional filter

        $query = Bill::with('user')->where('month', $bulanIni);

        if ($status) {
            $query->where('status', $status); // paid / unpaid
        }

        $bills = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.bills.index', compact('bills', 'bulanIni', 'status'));
    }
}
