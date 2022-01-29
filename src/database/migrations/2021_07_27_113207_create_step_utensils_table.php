<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepUtensilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_utensils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('step_id');
            $table->unsignedBigInteger('recipe_id');
            $table->string('amount', 50)->nullable();
            $table->string('name')->nullable();
            $table->string('special_use', 50)->nullable()->comment('for serving, optional');
            $table->string('special_characteristics', 50)->nullable()->comment('with lid,heavy-bottomed');
            $table->string('size', 50)->nullable()->comment('large ,small');
            $table->integer('sequence')->nullable();

            $table->foreign('step_id')->references('id')->on('recipe_steps')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
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
        Schema::dropIfExists('step_utensils');
    }
}
