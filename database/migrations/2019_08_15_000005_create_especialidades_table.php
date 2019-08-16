<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesTable extends Migration
{
    public function up()
    {
        Schema::create('especialidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->boolean('ativo')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
