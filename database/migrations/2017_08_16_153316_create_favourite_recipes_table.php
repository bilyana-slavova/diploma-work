<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouriteRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite_recipes', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('recipe_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('recipe_id')
            ->references('id')->on('recipes')
            ->onDelete('cascade');

            $table->primary(['user_id', 'recipe_id']);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourite_recipes');
    }
}
