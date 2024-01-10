<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRejectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order_rejects', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->mediumText('reject_note')->after('parent_id')->nullable();
            $table->mediumText('admin_note')->after('parent_id')->nullable();
            $table->mediumText('delivery_note')->after('parent_id')->nullable();
            $table->mediumText('note')->after('parent_id')->nullable();
            $table->mediumText('polygon')->after('parent_id')->nullable();
            $table->unsignedBigInteger('order_reject_id')->after('parent_id')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_rejects');
    }
}
