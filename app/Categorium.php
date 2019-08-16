<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorium extends Model
{
    use SoftDeletes;

    public $table = 'categoria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'ativo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
