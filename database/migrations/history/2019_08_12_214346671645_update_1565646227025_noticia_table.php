<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1565646227025NoticiaTable extends Migration
{
    public function up()
    {
        Schema::table('noticia', function (Blueprint $table) {
            $table->string('titulo')->change();
            $table->longText('texto')->change();
        });
    }

    public function down()
    {
        Schema::table('noticia', function (Blueprint $table) {
        });
    }
}
