<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* BISOGNA SEMPRE METTERE DENTRO LE '' DEL CREATE LA PAROLA IN SINGOLARE E IN ORDINE ALFABETICO CON LA _ DI MEZZO, SE AL POSTO DEL POST CI FOSSE STATO 'UVA' LA PAROLA DENTRO IL CREATE SAREBBE STATA 'tag_uva'*/
        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');

            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('tag_id');

            $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
