
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('currencies', function (Blueprint $table) {
            $table->id('id');
            $table->string('code',50)->nullable();
            $table->mediumText('name');
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->id('id');
            $table->string('code',50)->nullable();
            $table->mediumText('name');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->tinyInteger('currency_type')->default(2);
            $table->string('phone_code',50);
            $table->mediumText('image');
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id('id');
            $table->mediumText('name');
            $table->unsignedBigInteger('country_id');
            $table->double('shipping')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->mediumText('polygon')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('regions', function (Blueprint $table) {
            $table->id('id');
            $table->mediumText('name');
            $table->unsignedBigInteger('city_id');
            $table->double('shipping')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->mediumText('polygon')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');

        });


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('regions');
    }
}

