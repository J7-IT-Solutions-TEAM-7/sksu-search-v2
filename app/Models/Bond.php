<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory;

    public function employee_information(){
        return $this->hasOne('App\Models\Employee_information');
    }
}
