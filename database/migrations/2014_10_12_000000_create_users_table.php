<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('name_first')->nullable();
            $table->string('name_last')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('type', 50)->nullable(); // You'd need to specify the types here.
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('last_active')->nullable();
            $table->rememberToken();
            $table->string('code', 50)->nullable();
            $table->timestamp('code_expire')->nullable();
            $table->string('sms_code', 50)->nullable();
            $table->timestamp('sms_code_expire')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->mediumText('polygon')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('locale')->default('en');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('vip')->default(0);
            $table->tinyInteger('all_branch')->default(0);
            $table->tinyInteger('is_message')->default(0);
            $table->tinyInteger('is_notify')->default(0);
            $table->tinyInteger('is_client')->default(0);
            $table->tinyInteger('is_admin')->default(0);
            $table->tinyInteger('is_store')->default(0);
            $table->tinyInteger('is_delivery')->default(0);
            $table->tinyInteger('is_available')->default(0);
            $table->double('wallet')->default(0);
            $table->double('point')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->double('wallet')->default(0);
            $table->string('type',50)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->double('point')->default(0);
            $table->string('type',50)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('wallets');
        Schema::dropIfExists('points');
    }
}
