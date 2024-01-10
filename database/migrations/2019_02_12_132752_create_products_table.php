
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('polish_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->mediumText('name');
            $table->string('link')->nullable();
            $table->string('type',50)->nullable();
            $table->string('code')->nullable();
            $table->string('status')->nullable();
            $table->mediumText('image')->nullable();
            $table->mediumText('content')->nullable();
            $table->double('max_amount')->nullable();
            $table->tinyInteger('max_addition')->nullable();
            $table->tinyInteger('max_addition_free')->nullable();
            $table->string('offer_type')->nullable();
            $table->double('offer_price')->nullable();
            $table->double('offer_amount')->nullable();
            $table->double('offer_amount_add')->nullable();
            $table->double('offer_percent')->nullable();
            $table->double('price')->default(1);
            $table->double('start')->default(1);
            $table->double('skip')->default(1);
            $table->integer('rate_count')->nullable();
            $table->double('rate_all')->nullable();
            $table->double('rate')->nullable();
            $table->double('order_limit')->nullable();
            $table->double('order_max')->nullable();
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_expire')->nullable();
            $table->string('day_start',50)->nullable();
            $table->string('day_expire',50)->nullable();
            $table->string('prepare_time')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('is_late')->default(0);
            $table->tinyInteger('is_size')->default(0);
            $table->tinyInteger('is_max')->default(0);
            $table->tinyInteger('filter')->default(0);
            $table->tinyInteger('offer')->default(0);
            $table->tinyInteger('sale')->default(0);
            $table->double('shipping')->default(0)->nullable();
            $table->tinyInteger('feature')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('product_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('product_id');
            $table->string('group')->nullable();
            $table->string('type');
            $table->string('key')->nullable();
            $table->text('value')->nullable();
            $table->integer('parent_id')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('addition_product', function (Blueprint $table) {
            $table->unsignedBigInteger('addition_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('addition_id')->references('id')->on('additions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['addition_id', 'product_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_meta');
        Schema::dropIfExists('addition_product');
    }
}
