<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    //
    protected $fillable = ['id','airport_name', 'code','city'];
}
