<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary_Entry extends Model
{
    use HasFactory;

    public function itinerary(){
        return $this->hasMany('App\Models\Itinerary');
    }
}
