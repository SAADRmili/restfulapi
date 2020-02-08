<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Seller;
use App\Transaction;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //

    use SoftDeletes;
    protected $dates =['deleted_at'];
    const AVAILABLE_PRODUCT ='available';
    const UNAVAILABLE_PRODUCT ='unavailable';
    protected $fillable =[
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id'
    ];

    public function isAvailable(){
        return $this->status == Product::AVAILABLE_PRODUCT;
    }


    public  function seller()
    {
        # code...
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function categories(){

        return $this->belongsToMany(Category::class);
    }
}
