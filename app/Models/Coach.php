<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = ['name', 'specialty', 'years_experience'];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
