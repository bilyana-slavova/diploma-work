<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->integer('recipe_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();

            $table->integer('amount');
            $table->integer('measurement_id')->unsigned();
            $table->timestamps();

            $table->foreign('measurement_id')
            ->references('id')->on('measurements')
            ->onDelete('cascade');

            $table->primary(['recipe_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredients');
    }
}
