<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTransparencyTable extends Migration
{
    public function up()
    {
        Schema::create('file_transparency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('file');

            $table->unsignedInteger('transparency_id');
            $table->foreign('transparency_id')->references('id')->on('transparencies')->onDelete('cascade');
            $table->timestamps();
        });
    }
}
