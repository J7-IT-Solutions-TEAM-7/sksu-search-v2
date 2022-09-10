<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    public function employee_information(){
        return $this->hasOne('App\Models\Employee_information');
    }

    public function campus(){
        return $this->hasOne('App\Models\Campus', 'id', 'campus_id');
    }

    public function head(){
        return $this->hasOne('App\Models\Employee_information','id','head_id');
    }

    public function admin(){
        return $this->hasOne('App\Models\Employee_information','id','admin_user_id');
    }

    public function oic_1(){
        return $this->hasOne('App\Models\Employee_information','id','OIC_1');
    }

    public function oic_2(){
        return $this->hasOne('App\Models\Employee_information','id','OIC_2');
    }

    public function oic_3(){
        return $this->hasOne('App\Models\Employee_information','id','OIC_3');
    }
}
