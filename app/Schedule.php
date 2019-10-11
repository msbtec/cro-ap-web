<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $dates = ['data'];
    protected $fillable = ['data','title','local','description'];
}
