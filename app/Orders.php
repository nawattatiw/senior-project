<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Orders extends Model{
  protected $table='orders';


    protected $dates = ['created_at', 'updated_at'];

    public function getStatusNameAttribute()
    {
        if ($this->status == "TO PAY") {
                if( $this->created_at){
                    if (Carbon::now()->gt( $this->created_at->addDays(2))) {
                        return "หมดอายุ";
                    }else{
                        return "ชำระเงิน";
                    }
                } else{
                    return "ชำระเงิน";
                }


        } else if ($this->status == "TO CHECK") {
            return "ตรวจสอบ";
        } else if ($this->status == "TO CHECKFAIL") {
            return "การตรวจสอบไม่สำเร็จ";
        }else if ($this->status == "TO SHIP") {
            return "กำลังจัดส่งสินค้า";
        }else if ($this->status == "EXPIRED") {
            return "หมดอายุ";
        }else if ($this->status == "COMPLETE") {
            return "สำเร็จ";
        }else{

            if (Carbon::now()->gt( $this->created_at->addDays(2))) {
                return "หมดอายุ";
            }else{
                return "ไม่ผ่าน";
            }
        }
    }

    public function getDateFormat()
    {
    return 'Y-m-d H:i:s';
    }


    public function orderproducts()
    {
        return $this->hasMany(OrderProduct::class,'order_id');
    }

}
