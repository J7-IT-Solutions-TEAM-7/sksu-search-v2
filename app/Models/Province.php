<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "philippine_provinces";
    //Change Primary Key
    protected $primaryKey = 'id';

    use HasFactory;

    public function travel_order(){
        return $this->belongsTo('App\Models\TravelOrder');
    }
}
