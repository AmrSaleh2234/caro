<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('phone',50)->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->mediumText('content')->nullable();
            $table->mediumText('attachment')->nullable();
            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
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
        Schema::dropIfExists('contacts');
    }
}
