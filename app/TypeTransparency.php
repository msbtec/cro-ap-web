<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTransparency extends Model
{
    protected $fillable = ['name','slug'];

    public function transparency()
    {
        return $this->hasMany('App\Transparency','type_id','id');
    }
}
