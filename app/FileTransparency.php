<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileTransparency extends Model
{
    protected $table = 'file_transparency';
    protected $fillable = ['name','file','transparency_id'];
}
