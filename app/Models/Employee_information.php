<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_information extends Model
{
    protected $table = "employee_informations";
    //Change Primary Key
    protected $primaryKey = 'id';

    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function office(){
        return $this->belongsTo('App\Models\Office');
    }
    public function position(){
        return $this->belongsTo('App\Models\Position');
    }
    public function bond(){
        return $this->belongsTo('App\Models\Bond');
    }

    public function travel_order_applicant(){
        return $this->belongsTo('App\Models\Travel_Order_Applicant');
    }

    public function travel_order_sinatory(){
        return $this->belongsTo('App\Models\Travel_Order_Signatory');
    }

    public function travel_order_sidenote(){
        return $this->belongsTo('App\Models\Travel_Order_Sidenote');
    }

    public function itinerary(){
        return $this->belongsTo('App\Models\Itinerary');
    }

    public function role_pivot(){
        return $this->HasOne('App\Models\Role_Pivot');
    }

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
