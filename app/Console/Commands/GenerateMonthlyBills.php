<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use App\Models\Bill;
use Carbon\Carbon;

class GenerateMonthlyBills extends Command
{
    protected $signature = 'bills:generate';
    protected $description = 'Generate monthly bills for each tenant if not already generated';

    public function handle()
    {
        $month = Carbon::now()->startOfMonth()->format('Y-m-d');

        $tenants = Tenant::all();
        $created = 0;

        foreach ($tenants as $tenant) {
            $alreadyExists = Bill::where('tenant_id', $tenant->id)
                ->where('month', $month)
                ->exists();

            if (!$alreadyExists) {
                Bill::create([
                    'tenant_id' => $tenant->id,
                    'amount' => 500000, // default nominal tagihan
                    'month' => $month,
                    'status' => 'unpaid',
                ]);
                $created++;
            }
        }

        $this->info("Tagihan bulan $month berhasil dibuat untuk $created penghuni.");
    }
}
