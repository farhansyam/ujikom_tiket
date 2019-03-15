<?php

namespace App;
use App\Booking;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $guarded = [];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Booking()
    {
       return $this->hasMany('App\Booking');
    }

}
