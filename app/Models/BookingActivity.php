<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class BookingActivity extends Pivot
{
    //
    protected $table = 'booking_activity';

    protected $fillable = [
        'booking_id', 'activity_id',
        'participants','price','status'
    ];
}
