<?php

namespace App;

use App\Product;

class Tag extends Model
{
    //
    public function products(){

        return $this->belongsTomany(Product::class);
        
    }

}
