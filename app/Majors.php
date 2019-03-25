<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
     public function years()
    {
        return $this->belongsTo('App\Years');
    }
}
