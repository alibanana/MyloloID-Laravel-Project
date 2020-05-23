<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // A material may be present in many products
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
