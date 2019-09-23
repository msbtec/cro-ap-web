<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilitacaoProfissionalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('habilitacao_profissional', function (Blueprint $table) {
            $table->unsignedInteger('profissional_id');
            $table->foreign('profissional_id', 'profissional_id_fk_256933')->references('id')->on('profissionals');
            $table->unsignedInteger('habilitacao_id');
            $table->foreign('habilitacao_id', 'habilitacao_id_fk_256933')->references('id')->on('habilitacaos');
        });
    }
}
