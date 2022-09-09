<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel_Order extends Model
{
    use HasFactory;

    public function itinerary(){
        return $this->belongsTo('App\Models\Itinerary');
    }


    public function side_note(){
        return $this->belongsTo('App\Models\Travel_Order_Sidenote');
    }

    public function dte(){
        return $this->hasMany('App\Models\DTE');
    }

    public function travel_order_cash_advance(){
        return $this->hasMany('App\Models\Travel_Order_Cash_Advance');
    }

    // public function region(){
    //     return $this->hasOne('App\Models\Region','id','philippine_regions_id');
    // }
    // public function province(){
    //     return $this->hasOne('App\Models\Province','id','philippine_provinces_id');
    // }
    // public function city(){
    //     return $this->hasOne('App\Models\City','id','philippine_cities_id');
    // }

    public function travel_order_applicant(){  
        return $this->belongsTo('App\Models\TravelOrderApplicant');
    }
    public function travel_order_signatory(){  
        return $this->belongsTo('App\Models\TravelOrderSignatory');
    }
}
