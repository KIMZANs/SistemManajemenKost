<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['number', 'status'];


    public function tenant()
    {
        return $this->hasOne(Tenant::class);
    }
}
