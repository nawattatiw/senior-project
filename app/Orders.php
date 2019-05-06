<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Orders extends Model{
  protected $table='orders';


    public function getStatusNameAttribute()
    {
        if ($this->status == "TO PAY") {
            return "ชำระเงิน";
        } else if ($this->status == "TO CHECK") {
            return "ตรวจสอบ";
        }else if ($this->status == "TO SHIP") {
            return "จัดส่ง";
        }else{
            return "สำเร็จ";
        }
    }


//   public function getDateFormat()
// {
//      return 'Y-m-d H:i:s.u';
// }
}
