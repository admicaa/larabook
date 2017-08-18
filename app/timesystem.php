<?php

namespace App;
use App\timesinsystems;
class timesystem extends Model
{
    //
    function times(){
        return $this->hasMany(timesinsystems::class);
    }
    function newtime(timesinsystems $timesinsystems){
        $this->times()->save($timesinsystems);
    }
}
