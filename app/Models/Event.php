<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'event_date', 'max_participants', 'price', 'image_path'];

    protected $casts = [
        'event_date' => 'datetime',
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_event')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
