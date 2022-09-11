<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_code',
        'position_desc',
    ];

    public function employee_information(){
        return $this->hasOne('App\Models\Employee_information');
    }
}
