<?php

namespace App\Models;

use App\Models\Coach;
use App\Models\LessonPackage;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'type',
        'date',
        'time',
        'maxParticipants'
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'lesson_package')
                    ->using(LessonPackage::class)
                    ->withPivot('numberOfSessions')
                    ->withTimestamps();
    }
}
