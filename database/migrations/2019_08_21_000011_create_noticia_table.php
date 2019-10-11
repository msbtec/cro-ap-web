<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiaTable extends Migration
{
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('slug');
            $table->date('dt_publicacao');
            $table->longText('texto');
            $table->string('resumo');
            $table->boolean('ativo')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
