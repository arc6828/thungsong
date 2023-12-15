<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('userId')->nullable();
            $table->string('displayName')->nullable();
            $table->string('pictureUrl')->nullable();
            $table->string('statusMessage')->nullable();
            $table->string('language')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('line_users');
    }
}
