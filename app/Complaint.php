<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['name','phone','email','reported','address','cro','local','status','message','trash'];

}
