<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
     protected $fillable = ['productid','name','price'];


    // public function OrderProduct(){
    //     return $this->belongsTo(OrderProduct::class,'name');
    // }
}
