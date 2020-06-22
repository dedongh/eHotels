<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use App\Model\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $room = Room::paginate();
        return new RoomCollection($room);
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
        $last_record = Room::orderBy('id', 'desc')->first();

        $new_value = $last_record->room_number + 1;
        //
        $this->validate($request, [
            'room_type' => 'required|string',
            'rate_per_night' => 'required|numeric',
            'num_of_persons' => 'required|numeric'
        ]);

        $room = Room::create([
            'room_number' => $request->has('room_number')? $request->room_number : $new_value,
            'room_type' => $request->room_type,
            'facilities' => $request->facilities,
            'floor' => $request->floor,
            'num_of_persons' => $request->num_of_persons,
            'rate_per_night' => $request->rate_per_night
        ]);

        return new RoomResource($room);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        return new RoomResource($room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        return response('Room deleted successfully',204);
    }

    public function show_room_status()
    {
        $last_record = Room::orderBy('id', 'desc')->first();

        $new_value = $last_record->room_number + 1;

        return 'last_record: '. $last_record->room_number. ' next room number: '. $new_value;

        //return new RoomResource($last_record);
    }
}
