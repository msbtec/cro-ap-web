<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProfissional extends Model
{
    use SoftDeletes;

    public $table = 'categoria_profissionals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'sigla',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function profissionals()
    {
        return $this->hasMany(Profissional::class, 'categoria_id', 'id');
    }
}
