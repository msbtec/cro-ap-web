<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParceirosTable extends Migration
{
    public function up()
    {
        Schema::create('parceiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->longText('detalhes');
            $table->boolean('ativo')->default(0)->nullable();
            $table->string('endereco');
            $table->longText('contato')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
