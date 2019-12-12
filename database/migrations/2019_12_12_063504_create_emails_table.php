<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('emails', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->timestamps();
        // });

        Schema::create('emails', function(Blueprint $table) {
      		$table->increments('id');
      		$table->string('email', 100);
      	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
