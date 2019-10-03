<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public $table = 'slide';
    protected $fillable = ['title', 'image'];

}
