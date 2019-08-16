<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Informaco extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'informacos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'texto',
        'pagina',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getFotosAttribute()
    {
        $files = $this->getMedia('fotos');

        $files->each(function ($item) {
            $item->url = $item->getUrl();
        });

        return $files;
    }
}
