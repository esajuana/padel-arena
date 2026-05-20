<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Court extends Model
{
    protected $fillable = [
        'name',
        'type',
        'price_per_hour',
        'image',
        'description',
        'status'
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
