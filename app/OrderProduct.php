<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model{
  protected $table='order_products';


//    protected $fillable=['orderid','productid','amout','price','total',"billaddress"];
//    public function product(){
//      return $this->hasOne(product::class,"name","productid");
//    }


    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

}
