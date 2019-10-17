<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $fillable = ['name','phone','email','address','status','message','trash'];

}
