<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->date('data');
            $table->longText('informacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
