<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    // A size may be available in more than one products
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
