<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_child_id')->nullable();
            $table->unsignedBigInteger('order_id');
            // $table->mediumText('attribute')->nullable();
            $table->double('offer_price')->nullable();
            $table->double('price')->default(1);
            $table->double('amount')->default(1);
            $table->double('amount_addition')->default(0);
            $table->double('price_addition')->default(0);
            $table->double('offer_amount')->default(0);
            $table->double('offer_amount_add')->default(0);
            $table->double('total_amount')->default(1);
            $table->double('total')->default(1);
            $table->double('total_price')->default(1);
            $table->mediumText('note');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_child_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');

        });
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_child_id')->nullable();
            $table->unsignedBigInteger('cart_id');
            // $table->mediumText('attribute')->nullable();
            $table->double('offer_price')->nullable();
            $table->double('price')->default(1);
            $table->double('amount')->default(1);
            $table->double('amount_addition')->default(0);
            $table->double('price_addition')->default(0);
            $table->double('offer_amount')->default(0);
            $table->double('offer_amount_add')->default(0);
            $table->double('total_amount')->default(1);
            $table->double('total')->default(1);
            $table->double('total_price')->default(1);
            $table->mediumText('note');
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('carts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_child_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('cart_items');
    }
}
