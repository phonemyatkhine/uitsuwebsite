<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $table = 'positions';

    public function user() {
        $this->hasMany('App\User');
    }
}
