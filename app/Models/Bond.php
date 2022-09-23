<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    protected $fillable = [
        'bond_name',
        'employee_id',
        'validity_date',
    ];

    use HasFactory;

    public function employee_information(){
        return $this->hasOne('App\Models\Employee_information');
    }
}
