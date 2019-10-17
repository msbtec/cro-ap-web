<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['name_1','cro_1','name_2','email_2','telefone_2','local','status','message','trash'];

}
