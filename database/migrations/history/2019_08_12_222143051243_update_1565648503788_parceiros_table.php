<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1565648503788ParceirosTable extends Migration
{
    public function up()
    {
        Schema::table('parceiros', function (Blueprint $table) {
            $table->string('endereco');
        });
    }

    public function down()
    {
        Schema::table('parceiros', function (Blueprint $table) {
        });
    }
}
