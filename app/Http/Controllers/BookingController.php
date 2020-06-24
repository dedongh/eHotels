<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingCollection;
use App\Http\Resources\BookingResource;
use App\Model\Booking;
use App\Model\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = Booking::paginate();
        return new BookingCollection($bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
        return new BookingResource($booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
        $booking->delete();
        return response('Booking deleted successfully',204);
    }

    public function book_now(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $room_number = $room->room_number;
        $rate_per_night = $room->rate_per_night;

        if ($room->status != 0) {
            return response()->json([
                'message' => 'room is either booked or reserved'
            ], 422);
        }

        $total = $request->days_spent * $rate_per_night;
        $balance = $request->amount_paid - $total;

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'arrival' => 'required',
            'checkout' => 'required',
            'amount_paid' => 'gte:'.$total,
        ]);




        $booking = Booking::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
            'car_number' => $request->car_number,
            'arrival' => $request->arrival,
            'checkout' => $request->checkout,
            'days_spent' => $request->days_spent,
            'no_of_adults' => $request->no_of_adults,
            'no_of_children' => $request->no_of_children,
            'room_number' => $room_number,
            'rate_per_night' => $rate_per_night,
            'additional_charges' => $request->additional_charges,
            'total' => $total,
            'amount_paid' => $request->amount_paid,
            'balance' => $balance,
            'notes' => $request->notes,
            'room_id' => $room->id

        ]);

        $update = Room::where('id', $id)->update([
            'status' => 1
        ]);


        return new BookingResource($booking);
    }
}
