<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movietable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }
<<<<<<< HEAD
 /**
=======
    /**
>>>>>>> 25cbcb9e001783a9d571c8704581f82aa6e6f4ce
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movietable');
    }
}
