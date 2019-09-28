<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\CategoriaProfissional;


class Profissional extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'profissionals';

    protected $appends = [
        'foto',
        'tipo',
    ];

    const TIPO_ENDERECO_SELECT = [
        'P' => 'Profissional',
        'R' => 'Residencial',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'data_nascimento',
    ];

    protected $fillable = [
        'cep',
        'cpf',
        'cro',
        'nome',
        'numero',
        'fone_1',
        'fone_2',
        'fone_3',
        'bairro',
        'updated_at',
        'created_at',
        'deleted_at',
        'logradouro',
        'complemento',
        'categoria_id',
        'municipio_id',
        'tipo_endereco',
        'data_nascimento',
        'categoria_id',
        'validade',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function users()
    {
        $this->attributes['categoria_id'] = 'OK';
        return $this->hasMany(User::class, 'id_profissional_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaProfissional::class, 'categoria_id');
    }

    public function getDataNascimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataNascimentoAttribute($value)
    {
        $this->attributes['data_nascimento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFotoAttribute()
    {
        $file = $this->getMedia('foto')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
    public function getTipoAttribute()
    {
        $id = $this->attributes['categoria_id'];
        $model = CategoriaProfissional::where('id',$id)->first();
        return $model->nome;
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class);
    }

    public function habilitacoes()
    {
        return $this->belongsToMany(Habilitacao::class);
    }
}
