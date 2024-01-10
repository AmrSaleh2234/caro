
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->unsignedBigInteger('cancel_by')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->double('price')->default(0);
            $table->double('shipping')->default(0);
            $table->double('discount')->default(0);
            $table->double('total')->default(0);
            $table->double('paid')->default(0);
            $table->string('status',50)->default('request');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->timestamp('cancel_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('order_id');
            $table->string('status',50)->default('request');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('order_metas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('order_id');
            $table->string('phone');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('address')->nullable();
            $table->mediumText('geo_address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_statuses');
        Schema::dropIfExists('order_metas');
    }
}
