<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    public function quarter(){
        return $this->belongsTo('App\Quarter');
    }
}
