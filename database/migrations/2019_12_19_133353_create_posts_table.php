<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titre', 80);
      			$table->text('contenu');
            $table->text('excerpt', 255);
      			$table->integer('user_id')->unsigned();
            // $table->unsignedBigInteger('user_id');
      			$table->foreign('user_id')
      				  ->references('id')
      				  ->on('users')
      				  ->onDelete('cascade')
      				  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('posts', function(Blueprint $table) {
        //     $table->dropForeign('posts_user_id_foreign');
        // });
        Schema::dropIfExists('posts');
    }
}
