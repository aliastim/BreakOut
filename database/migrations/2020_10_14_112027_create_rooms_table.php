<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->integer('reviews')->default(5);
            $table->integer('number_reviews')->default(0);
            $table->longText('description')->nullable();
            $table->integer('players')->default(1);
            $table->string('device')->default('desktop');
            $table->integer('riddles')->default(1);
            $table->string('duration')->default("1h");
            $table->integer('difficulty')->default(1);
            $table->integer('difficulty_reviews')->default(0);
            $table->integer('games_played')->default(0);
            $table->integer('price')->default(0);
            $table->text('img_link')->nullable();
            $table->text('url')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
