<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public $table = 'train_stations';
    protected $fillable = ['station_name','code','city'];
}
