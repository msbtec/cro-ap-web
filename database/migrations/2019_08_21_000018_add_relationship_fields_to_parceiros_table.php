<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToParceirosTable extends Migration
{
    public function up()
    {
        Schema::table('parceiros', function (Blueprint $table) {
            $table->unsignedInteger('categoria_id')->nullable();
            $table->foreign('categoria_id', 'categoria_fk_238363')->references('id')->on('categoria');
        });
    }
}
