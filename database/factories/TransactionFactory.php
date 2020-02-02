<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use App\User;
use App\Transaction;

use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    $s = Seller::has('products')->get()->random();

    $b= User::all()->except($s->id)->random();
    return [
        //
        'quantity'=>$faker->numberBetween(1,3),
        'buyer_id'=>$b->id,
        'product_id'=> $s->products->random()->id,
    ];
});
