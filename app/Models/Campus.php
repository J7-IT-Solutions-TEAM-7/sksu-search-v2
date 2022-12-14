<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'campus_code',
        'address',
        'telephone',
        'email',
        'admin_user_id',
    ];


    public function office(){
        return $this->belongsTo('App\Models\Office');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function admin(){
        return $this->hasOne('App\Models\Employee_information', 'id', 'admin_user_id');
    }
}
