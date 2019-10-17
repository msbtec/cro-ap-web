<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transparency extends Model
{
    protected $fillable = ['name','type_id','slug'];

    public function type()
    {
        return $this->belongsTo(TypeTransparency::class);
    }
}
