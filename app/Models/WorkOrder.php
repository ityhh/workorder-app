<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'wo_number', 'date', 'department', 'name', 'work_order', 'to_department', 'status', 'status_date', 'remarks'
    ];
}
