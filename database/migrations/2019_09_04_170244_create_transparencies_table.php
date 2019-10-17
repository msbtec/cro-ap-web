<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransparenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transparencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');

            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type_transparencies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transparencies');
    }
}
