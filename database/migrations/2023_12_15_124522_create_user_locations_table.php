<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('address',1024)->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('owner')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_locations');
    }
}
