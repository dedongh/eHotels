<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    const AVAILABLE_ROOMS = 0;
    const BOOKED_ROOMS = 1;
    const RESERVED_ROOMS = 2;
    const OUT_OF_SERVICE_ROOMS = 3;

    protected $table = 'rooms';

    protected $fillable = [
        'room_number', 'room_type', 'facilities', 'image', 'floor', 'num_of_persons', 'rate_per_night', 'status'
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeRoomType($query, $room_type)
    {
        return $query->where('room_type', $room_type);
    }

    public function scopeAvailableRooms($query)
    {
        return $query->where('status', 0);
    }
    public function scopeBookedRooms($query)
    {
        return $query->where('status', 1);
    }
    public function scopeReservedRooms($query)
    {
        return $query->where('status', 2);
    }
    public function scopeUnAvailableRooms($query)
    {
        return $query->where('status', 3);
    }
}
