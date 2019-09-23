<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensagem extends Model
{
    use SoftDeletes;

    public $table = 'mensagems';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'mensagem',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
