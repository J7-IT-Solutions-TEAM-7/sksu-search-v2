<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    public function itinerary_entry(){
        return $this->belongsTo('App\Models\Itinerary_Entry');
    }

    public function travel_order(){
        return $this->hasMany('App\Models\Travel_Order');
    }

    public function employee_information(){
        return $this->hasOne('App\Models\Employee_information', 'id', 'employee_id');
    }

    public function travel_order_cash_advance(){
        return $this->hasMany('App\Models\Travel_Order_Cash_Advance');
    }
}
