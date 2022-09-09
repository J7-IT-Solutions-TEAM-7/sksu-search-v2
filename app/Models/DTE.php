<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTE extends Model
{
    use HasFactory;

    public function travel_order(){
        return $this->belongsTo('App\Models\Travel_Order');
    }
}
