<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        Schema::create('termables', function (Blueprint $table) {
            $table->unsignedBigInteger('term_id');
            $table->morphs('termable');
            $table->foreign('term_id')->references('id')->on('terms')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['term_id','termable_id','termable_type']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
        Schema::dropIfExists('termables');
    }
}
