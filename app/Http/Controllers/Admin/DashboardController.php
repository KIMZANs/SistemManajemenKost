<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Complaint;
use App\Models\Bill;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKamarTerisi = Tenant::whereNotNull('room_id')->count();

        $jumlahKamarKosong = Room::doesntHave('tenant')->count();

        $jumlahKomplainBaru = Complaint::where('status', 'Menunggu')->count();

        $bulanIni = now()->format('Y-m');

        $penghuniBelumBayar = \App\Models\Bill::where('month', $bulanIni)
            ->where('status', 'unpaid')
            ->distinct('tenant_id')
            ->count('tenant_id');

        return view('admin.dashboard', compact(
            'jumlahKamarTerisi',
            'jumlahKamarKosong',
            'jumlahKomplainBaru',
            'penghuniBelumBayar'
        ));
    }
}
