<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('type',50)->default('house');
            $table->string('latitude');
            $table->string('longitude');
            $table->mediumText('geo_address')->nullable();
            $table->string('geo_state')->nullable();
            $table->string('geo_city')->nullable();
            $table->string('place_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->mediumText('additional_info');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
