<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'seats',
        'transmission',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
