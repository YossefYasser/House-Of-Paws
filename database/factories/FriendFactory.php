<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Friend;
use Faker\Generator as Faker;

$factory->define(Friend::class, function (Faker $faker) {
    do{
        $from=1;
        $to=rand(5,20);

    }while($from==$to);
    return [
       'user_id'=>$from,
        'friend_id'=>$to,

    ];
});
