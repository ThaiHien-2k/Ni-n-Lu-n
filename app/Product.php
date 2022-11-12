<?php

namespace App;
use App\Stock;
use App\Insurance;
use App\Config;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function config()
    {
        return $this->hasOne(Config::class);
    }
}