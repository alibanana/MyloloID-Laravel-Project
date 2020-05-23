<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // A photo belongs to only one product
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
