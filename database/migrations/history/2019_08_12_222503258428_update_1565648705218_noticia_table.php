<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1565648705218NoticiaTable extends Migration
{
    public function up()
    {
        Schema::table('noticia', function (Blueprint $table) {
            $table->string('titulo')->change();
            $table->longText('texto')->change();
            $table->boolean('ativo')->default(0)->nullable();
        });
    }

    public function down()
    {
        Schema::table('noticia', function (Blueprint $table) {
        });
    }
}
