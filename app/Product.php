<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Tag;
class Product extends Model
{
    //
    public function tags(){
        
        return $this->belongsTomany(Tag::class);
    }

}
