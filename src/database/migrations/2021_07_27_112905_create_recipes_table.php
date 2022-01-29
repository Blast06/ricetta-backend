<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('portion_unit')->nullable();
            $table->string('portion_type')->nullable()->comment('piece , servings');
            $table->string('difficulty', 50)->nullable();
            $table->string('preparation_time', 20)->nullable();
            $table->string('baking_time', 20)->nullable();
            $table->string('resting_time', 20)->nullable();
            $table->text('dish_type')->nullable();
            $table->text('cuisine')->nullable();
            $table->tinyInteger('status')->nullable()->default('0');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('recipes');
    }
}
