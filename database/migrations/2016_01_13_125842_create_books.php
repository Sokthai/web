<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function(Blueprint $table){
           $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 500);
            $table->float('price')->nullale();
            $table->string('from', 500);
            $table->string('location', 500)->nullable();
            $table->text('description')->nullable();
            $table->date('dates');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //set the 'user_id' as foreign key that reference to the 'id' of the users table in database
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
