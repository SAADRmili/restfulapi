<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buyer;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //

    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable=[
        'quantity',
        'buyer_id',
        'product_id',
    ];


    public function buyer()
    {
        # code...
        return $this->belongsToMany(Buyer::class);
    }
    public function product()
    {
        # code...
        return $this->belongsToMany(Product::class);
    }
}
