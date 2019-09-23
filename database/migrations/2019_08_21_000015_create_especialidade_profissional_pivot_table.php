<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadeProfissionalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('especialidade_profissional', function (Blueprint $table) {
            $table->unsignedInteger('profissional_id');
            $table->foreign('profissional_id', 'profissional_id_fk_256931')->references('id')->on('profissionals');
            $table->unsignedInteger('especialidade_id');
            $table->foreign('especialidade_id', 'especialidade_id_fk_256931')->references('id')->on('especialidades');
        });
    }
}
