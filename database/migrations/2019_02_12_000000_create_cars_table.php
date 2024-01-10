<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_brands', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->mediumText('image')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_brand_id')->nullable();
            $table->mediumText('name')->nullable();
            $table->mediumText('image')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('car_brands');
        Schema::dropIfExists('car_models');
    }
}
