<?php

namespace App;
use App\Transaction;

class Buyer extends User
{
    //

    public function transactions()
    {
        # code...
        return $this->hasMany(Transaction::class);
    }
}
