<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = 'bookings';

    protected $fillable = [
        'name','phone', 'country','address','car_number','arrival','checkout',
        'days_spent','no_of_adults','no_of_children','room_number','rate_per_night',
        'additional_charges','total','amount_paid','balance','notes','room_id','status'
    ];

    protected $casts = [
        'status' => 'integer'
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
}
