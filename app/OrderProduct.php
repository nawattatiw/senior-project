<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model{
  protected $table='Order_Products';
    protected $fillable=['orderid','productid','amout','price','total',"billaddress"];
    public function product(){
      return $this->hasOne(product::class,"name","productid");
    }
    public function billaddress(){
      return $this->belongsTo(AddressUser::class,"billaddress","phonenumber");
    }
}
