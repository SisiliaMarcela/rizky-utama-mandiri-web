<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'electricity_cost','water_cost', 'machine_cost', 'repairation_cost', 'fuel_cost', 'date'
    ];
}
