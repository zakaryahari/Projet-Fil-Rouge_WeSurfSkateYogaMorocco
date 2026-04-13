<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Lesson;
use App\Models\LessonPackage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'base_price', 'image_path'];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_package')
                    ->using(LessonPackage::class)
                    ->withPivot('numberOfSessions')
                    ->withTimestamps();
    }
}
