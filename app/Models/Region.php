<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "philippine_regions";
    //Change Primary Key
    protected $primaryKey = 'id';

    use HasFactory;

    public function travel_order(){
        return $this->belongsTo('App\Models\TravelOrder');
    }
}
