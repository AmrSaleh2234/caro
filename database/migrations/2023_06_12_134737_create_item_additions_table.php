<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemAdditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_additions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('addition_id');
            $table->unsignedBigInteger('order_item_id');
            $table->double('price')->default(1);
            $table->double('amount')->default(1);
            $table->double('total')->default(1);
            $table->timestamps();
            $table->foreign('order_item_id')->references('id')->on('order_items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('addition_id')->references('id')->on('additions')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('cart_item_additions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('addition_id');
            $table->unsignedBigInteger('cart_item_id');
            $table->double('price')->default(1);
            $table->double('amount')->default(1);
            $table->double('total')->default(1);
            $table->timestamps();
            $table->foreign('cart_item_id')->references('id')->on('cart_items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('addition_id')->references('id')->on('additions')->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item_additions');
        Schema::dropIfExists('cart_item_additions');
    }
}
