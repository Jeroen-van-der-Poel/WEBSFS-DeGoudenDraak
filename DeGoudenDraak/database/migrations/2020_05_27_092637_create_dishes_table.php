<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dish_category')->nullable();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->integer('menu_number')->nullable();
            $table->string('menu_addition')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price');

            $table->foreign('dish_category')->references('id')->on('categories')->onDelete('cascade');
            //$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
