<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('url')->nullable();
            $table->string('owner')->nullable();
            $table->string('station_code')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('station_images');
    }
}
