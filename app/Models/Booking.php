<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $fillable = [
        'user_id',
        'service_id',
        'karyawan_id', // <-- INI DIA PERBAIKANNYA
        'location',
        'date',
        'time',
        'payment_method',
        'status',
        'user_name',
        'service_name',
        'service_price'
    ];

    protected $casts = [
        'status' => 'string',
        'date' => 'date',
        'time' => 'datetime:H:i'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'service_id');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
