<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaProfissionalsTable extends Migration
{
    public function up()
    {
        Schema::create('categoria_profissionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sigla')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
