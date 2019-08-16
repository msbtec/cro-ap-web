<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProfissionalsTable extends Migration
{
    public function up()
    {
        Schema::table('profissionals', function (Blueprint $table) {
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id', 'categoria_fk_240787')->references('id')->on('categoria_profissionals');
        });
    }
}
