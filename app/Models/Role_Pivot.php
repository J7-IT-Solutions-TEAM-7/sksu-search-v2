<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_Pivot extends Model
{
    use HasFactory;

    public function employee_information(){
        return $this->belongsTo('App\Models\Employee_information');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
}
