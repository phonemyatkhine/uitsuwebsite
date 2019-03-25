<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Model
{
    use Notifiable;

    protected $fillable = ['name','uno','status','start_date','stop_date','photo','positions_id','majors_id','years_en_id','email',  'password'];

    protected $hidden = ['password',  'remember_token'];
}
