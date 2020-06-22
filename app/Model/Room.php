<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'rooms';

    protected $fillable = [
        'room_number', 'room_type', 'facilities', 'image', 'floor', 'num_of_persons', 'rate_per_night', 'status'
    ];

    protected $casts = [
        'status' => 'integer',
    ];
}
