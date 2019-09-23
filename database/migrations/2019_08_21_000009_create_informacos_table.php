<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacosTable extends Migration
{
    public function up()
    {
        Schema::create('informacos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pagina');
            $table->longText('texto');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
