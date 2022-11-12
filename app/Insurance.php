<?php

namespace App;
use App\InsuranceDetail;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function insuranceDetails()
    {
        return $this->hasMany(InsuranceDetail::class)->whereNull('parent_id');
    }

    
}
