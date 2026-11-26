<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('admin')->default(false);
            $table->boolean('music')->default(true);
            $table->text('description')->nullable();
            $table->integer('gold')->default(0)->nullable();
            $table->integer('experience')->default(0)->nullable();
            $table->integer('games_played')->default(0)->nullable();
            $table->integer('games_win')->default(0)->nullable();
            $table->integer('games_duration')->nullable();
            $table->integer('games_best_duration')->nullable();
            $table->integer('games_loots')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admin');
            $table->dropColumn('music');
            $table->dropColumn('description');
            $table->dropColumn('gold');
            $table->dropColumn('experience');
            $table->dropColumn('games_played');
            $table->dropColumn('games_win');
            $table->dropColumn('games_duration');
            $table->dropColumn('games_best_duration');
            $table->dropColumn('games_loots');
        });
    }
}
