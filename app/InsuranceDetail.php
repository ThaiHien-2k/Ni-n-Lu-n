<?php

namespace App;
use App\Insurance;
use Illuminate\Database\Eloquent\Model;

class InsuranceDetail extends Model
{
    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }
}
