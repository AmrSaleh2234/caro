<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->mediumText('name')->nullable();
            $table->string('link',50)->nullable();
            $table->mediumText('title')->nullable();
            $table->mediumText('content')->nullable();
            $table->mediumText('image')->nullable();
            $table->mediumText('icon')->nullable();
            $table->string('type',50)->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
