<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'id' => $this->id,
            'type' => 'booking',
            'attributes' => [
                'name' => $this->name,
                'phone' => $this->phone,
                'country' => $this->country,
                'address' => $this->address,
                'car_number' => $this->car_number,
                'arrival' => $this->arrival,
                'checkout' => $this->checkout,
                'days_spent' => $this->days_spent,
                'no_of_adults' => $this->no_of_adults,
                'no_of_children' => $this->no_of_children,
                'room_number' => $this->room_number,
                'rate_per_night' => (double)$this->rate_per_night,
                'additional_charges' => (double)$this->additional_charges,
                'total' => (float)$this->total,
                'amount_paid' => (float)$this->amount_paid,
                'balance' => (float)$this->balance,
                'notes' => $this->notes,
                'room_id' => $this->room_id,
                'status' => $this->status == 0 ? 'pending':'approved',
            ]
        ];
    }
}
