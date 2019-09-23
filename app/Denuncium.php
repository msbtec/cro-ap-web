<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Denuncium extends Model
{
    use SoftDeletes;

    public $table = 'denuncia';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'A' => 'Aberto',
        'B' => 'Em Andamento',
        'C' => 'Arquivado',
    ];

    protected $fillable = [
        'nome',
        'email',
        'texto',
        'status',
        'telefone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
