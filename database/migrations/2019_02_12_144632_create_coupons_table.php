<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id('id');
            $table->mediumText('name')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('code',50);
            $table->string('type',50)->default('percentage');
            $table->double('discount')->default(1);
            $table->double('min_order')->default(1);
            $table->double('max_discount')->default(1);
            $table->integer('user_limit')->default(0);
            $table->integer('use_limit')->default(0);
            $table->integer('use_count')->default(0);
            $table->integer('count_used')->default(0);
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_expire')->nullable();
            $table->string('day_start',50)->nullable();
            $table->string('day_expire',50)->nullable();
            $table->tinyInteger('finish')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('order_id')->default(1);
            $table->timestamps();
        });

        Schema::create('coupon_group', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['coupon_id', 'group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('coupon_group');
    }
}
