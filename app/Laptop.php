<?php

namespace App;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
