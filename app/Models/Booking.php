<?php

namespace App\Models;

use App\Models\BookingActivity;
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
        'payment_id',
        'start_date',
        'end_date',
        'status',
        'totalPrice',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_booking')
                    ->using(BookingActivity::class)
                    ->withPivot('participants', 'price', 'status')
                    ->withTimestamps();
    }
}
