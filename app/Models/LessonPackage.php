<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LessonPackage extends Pivot
{
    //
    
    protected $table = 'lesson_package'; 

    protected $fillable = [
        'lesson_id', 'package_id',
        'numberOfSessions'
    ];
}
