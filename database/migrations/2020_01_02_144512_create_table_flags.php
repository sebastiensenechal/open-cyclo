<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFlags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('flags', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 60);
          $table->string('latitude', 15)->nullable();
          $table->string('longitude', 15)->nullable();
          $table->unsignedInteger('creator_id');
          $table->timestamps();

          $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flags');
    }
}
