<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    /** @use HasFactory<\Database\Factories\CoachFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialty',
        'years_experience',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
