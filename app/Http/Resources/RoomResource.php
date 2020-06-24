<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'room',
            'attributes' => [
                'room_number' => $this->room_number,
                'room_type' => $this->room_type,
                'facilities' => $this->facilities,
                'num_of_persons' => $this->num_of_persons,
                'rate_per_night' => config('company.currency_symbol'). $this->rate_per_night,
                'status' =>$this->status($this->status),
                'book_now' => route('room.book', $this->id),

            ]
        ];
    }

    public function status($status)
    {
        if ($status == 0) {
            return 'available';
        }else if ($status == 1) {
            return 'booked';
        }else if ($status == 2) {
            return 'reserved';
        }else if ($status == 3) {
            return 'out of service';
        }
    }
}
