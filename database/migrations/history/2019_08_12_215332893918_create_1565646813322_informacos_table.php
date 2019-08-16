<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1565646813322InformacosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('informacos')) {
            Schema::create('informacos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('pagina');
                $table->longText('texto');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('informacos');
    }
}
