<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->string('sexe')->default("male");
            $table->string('eye_color')->default("000000");
            $table->string('hair_color')->default("000000");
            $table->integer('bas_id')->nullable();
            $table->integer('haut_id')->nullable();
            $table->integer('accessoire_id')->nullable();
            $table->integer('chaussures_id')->nullable();
            $table->integer('gants_id')->nullable();
            $table->integer('visage_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avatar');
    }
}
