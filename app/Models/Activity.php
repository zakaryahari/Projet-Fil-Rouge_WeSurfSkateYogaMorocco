<?php

namespace App\Models;

use App\Models\Coach;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;
    
    protected $fillable = ['coach_id', 'name', 'duration_minutes', 'image_path'];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'activity_package')
                    ->withPivot('included_sessions')
                    ->withTimestamps();
    }
}
