<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel_Order_Applicant extends Model
{
    use HasFactory;

    public function travel_order(){
        return $this->hasOne('App\Models\Travel_Order','id','travel_order_id');
    }
    public function employee_information(){
        return $this->hasOne('App\Models\Employee_information','id','employee_id');
    }
}
