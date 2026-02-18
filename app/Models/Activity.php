<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\BookingActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'location',
        'date',
        'price'
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'activity_booking')
                    ->using(BookingActivity::class)
                    ->withPivot('participants', 'price', 'status')
                    ->withTimestamps();
    }
}
