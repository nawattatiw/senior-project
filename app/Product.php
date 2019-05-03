<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table ='products';
     protected $fillable = ['id','no','sku','name','unit','size','remaning','min_stock','default_price'];


    // public function OrderProduct(){
    //     return $this->belongsTo(OrderProduct::class,'name');
    // }
}
