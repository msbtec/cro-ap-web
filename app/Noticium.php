<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Noticium extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'noticia';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'dt_publicacao',
    ];

    protected $fillable = [
        'texto',
        'slug',
        'ativo',
        'titulo',
        'resumo',
        'created_at',
        'updated_at',
        'deleted_at',
        'dt_publicacao',
    ];


    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getDtPublicacaoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDtPublicacaoAttribute($value)
    {
        $this->attributes['dt_publicacao'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFotoCapaAttribute()
    {
        $file = $this->getMedia('foto_capa')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }

    public function getFotosAttribute()
    {
        $files = $this->getMedia('fotos');

        $files->each(function ($item) {
            $item->url = $item->getUrl();
        });

        return $files;
    }

    public function mediac()
    {
        return $this->belongsTo('App\Media','id','model_id');
    }
}
