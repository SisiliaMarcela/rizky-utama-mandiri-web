<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name', 'jobdesk', 'phone_number', 'address', 'employee_status', 'employee_salary', 'join_date'
    ];
}
