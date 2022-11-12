<?php

namespace App;
use App\Insurance;
use App\Laptop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }    

    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }   
}