<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1565641671899NoticiaTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('noticia')) {
            Schema::create('noticia', function (Blueprint $table) {
                $table->increments('id');
                $table->string('titulo')->nullable();
                $table->date('dt_publicacao');
                $table->longText('texto')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('noticia');
    }
}
