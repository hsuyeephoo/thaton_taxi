<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    public function quarter(){
        return $this->belongsTo('App\Quarter');
    }
    public function road(){
        return $this->belongsTo('App\Road');
    }
}
