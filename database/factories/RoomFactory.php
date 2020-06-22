<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    $room_type = collect(['Basic','Deluxe Double','Executive Double','Family']);
    $floor = collect(['First','Second','Third','Fourth','Fifth','Sixth']);
    $status = collect([0,1,2,3]);

    return [
        //
        'room_type' => $room_type->random(),
        'facilities' => 'Free parking, Wifi, Free breakfast, Air conditioning,Telephone, Kitchenette, Refrigerator, Flatscreen TV',
        'floor' => $floor->random(),
        'rate_per_night' => $faker->numberBetween(100, 1000),
        'num_of_persons' => $faker->numberBetween(1, 3),
        'room_number' => $faker->unique()->numberBetween(1, 600),
        'status' => $status->random(),


    ];
});
