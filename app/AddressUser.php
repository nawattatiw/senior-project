<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
  protected $table='address';
  protected $fillable=['name','phonenumber','email','address','district','province','zipcode','country'];
  public function order(){
    return $this->hasMany(OrderProduct::class,"billaddress","phonenumber");
  }
}
