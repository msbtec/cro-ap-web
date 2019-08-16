<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parceiro extends Model
{
    use SoftDeletes;

    public $table = 'parceiros';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'ativo',
        'detalhes',
        'endereco',
        'created_at',
        'updated_at',
        'deleted_at',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorium::class, 'categoria_id');
    }
}
