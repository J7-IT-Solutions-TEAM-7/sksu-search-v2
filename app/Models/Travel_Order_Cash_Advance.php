<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel_Order_Cash_Advance extends Model
{
    use HasFactory;

    public function travel_order(){
        return $this->belongsTo('App\Models\Travel_Order');
    }

    public function itinerary(){
        return $this->belongsTo('App\Models\Itenerary');
    }

    public function disbursement_voucher(){
        return $this->belongsTo('App\Models\Disbursement_Voucher', 'id', 'dv_id');
    }

    public function employee_information(){
        return $this->belongsTo('App\Models\Employee_information', 'id', 'employee_id');
    }
}
