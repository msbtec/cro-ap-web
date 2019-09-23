<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habilitacao extends Model
{
    use SoftDeletes;

    public $table = 'habilitacaos';

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

    public function profissionals()
    {
        return $this->belongsToMany(Profissional::class);
    }
}
