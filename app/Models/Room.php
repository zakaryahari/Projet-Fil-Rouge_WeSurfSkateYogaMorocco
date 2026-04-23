<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    protected $fillable = ['type', 'capacity', 'price_per_night', 'total_stock', 'is_active', 'image_path'];

    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }                         
}
