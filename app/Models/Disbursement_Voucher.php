<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disbursement_Voucher extends Model
{
    use HasFactory;

    public function travel_order_cash_advance(){
        return $this->hasMany('App\Models\Travel_Order_Cash_Advance');
    }

    public function activity_cash_advance(){
        return $this->hasMany('App\Models\Activity_Cash_Advance');
    }

    public function payroll_cash_advance(){
        return $this->hasMany('App\Models\Payroll_Cash_Advance');
    }
}
