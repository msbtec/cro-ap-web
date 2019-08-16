<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1565648299967ParceirosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('parceiros')) {
            Schema::create('parceiros', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nome');
                $table->longText('detalhes');
                $table->boolean('ativo')->default(0)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('parceiros');
    }
}
