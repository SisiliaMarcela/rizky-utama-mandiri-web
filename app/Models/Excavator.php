<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excavator extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name', 'brand', 'status', 'fuel', 'rental_price', 'unit_description', 'image', 'date'
    ];
}
