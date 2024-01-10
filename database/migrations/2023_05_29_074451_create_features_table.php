<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        Schema::create('featureables', function (Blueprint $table) {
            $table->unsignedBigInteger('feature_id');
            $table->morphs('featureable');
            $table->foreign('feature_id')->references('id')->on('features')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['feature_id','featureable_id','featureable_type']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
        Schema::dropIfExists('featureables');
    }
}
