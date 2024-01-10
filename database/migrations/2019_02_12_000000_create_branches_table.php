<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->mediumText('content')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('type')->nullable();
            $table->mediumText('image')->nullable();
            $table->mediumText('attachment')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->mediumText('polygon')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('group_user', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['group_id', 'user_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('group_user');
    }
}
