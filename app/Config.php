<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
