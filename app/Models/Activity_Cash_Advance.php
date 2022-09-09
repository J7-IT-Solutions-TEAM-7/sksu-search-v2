<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_Cash_Advance extends Model
{
    use HasFactory;

    public function disbursement_voucher(){
        return $this->belongsTo('App\Models\Disbursement_Voucher', 'id', 'dv_id');
    }

    public function employee_information(){
        return $this->belongsTo('App\Models\Employee_information', 'id', 'employee_id');
    }
}
