<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //for many to many relationship
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('book_tag', function (Blueprint $table) {
            $table->integer('book_id')->unsigned()->index(); //put this id to index for foreign key
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            $table->integer('tag_id')->unsigned()->index(); //put this id to index for foreign key
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
        Schema::drop('book_tag');
    }
}
