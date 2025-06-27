<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'tenant_id',
        'amount',
        'month',
        'status',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function getUserAttribute()
    {
        return $this->tenant->user ?? null;
    }
}
