<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionalsTable extends Migration
{
    public function up()
    {
        Schema::create('profissionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cro');
            $table->integer('cpf');
            $table->date('data_nascimento');
            $table->string('fone_1')->nullable();
            $table->string('fone_2');
            $table->string('fone_3')->nullable();
            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('municipio')->nullable();
            $table->string('tipo_endereco')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
