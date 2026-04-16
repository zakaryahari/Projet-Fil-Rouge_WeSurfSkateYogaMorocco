<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'room_id',
        'start_date',
        'end_date',
        'total_price',
        'payment_status',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'booking_event')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
