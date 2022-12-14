<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_code',
        'role_desc',
    ];

    public function role_pivot(){
        return $this->HasOne('App\Models\Role_Pivot');
    }

    public function employee_information(){
        return $this->hasOne('App\Models\Employee_information');
    }
}
