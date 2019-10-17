<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $dates = ['date'];
    protected $fillable = ['name','slug','date','local','text','image','folder','secure'];
}
