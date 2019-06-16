<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','positions_id','majors_id','uno','status','start_date','years_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function position() {
        $this->belongsTo('App\Positions');
    }

    public function organizer() {
        $this->belongsTo(Organizers::class);
    }

    public function hasPosition($position) {
        if(Positions::where('level', Auth::user()->positions_id)->first()) {
            if(Positions::where('level', Auth::user()->positions_id)->first()->name == $position) {
                return true;
            } else {
                return false;
            }
        }
    }
}
