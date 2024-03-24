<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_name',
        'vehicle_mileage',
        'appointment_date',
        'preferred_time',
        'customer_name',
        'customer_email',
        'customer_phone',
        'comment',
        'preferred_way',
    ];
}
