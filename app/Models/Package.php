<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Activity;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'duration_days', 'base_price', 'image_path'];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_package')
                    ->withPivot('included_sessions')
                    ->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
