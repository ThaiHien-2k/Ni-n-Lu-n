<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Insurance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('phone')->nullable();
            $table->text('body')->nullable();
            $table->integer('order_id')->unsigned();
            $table->text('nameStaff')->nullable();
            $table->integer('cost')->unsigned();
            $table->text('status')->nullable()->default('Đã nhận máy');
            $table->datetime('dateTake')->nullable();
            $table->datetime('dateReturn')->nullable();
            $table->timestamps();
            // $table->index('product_id');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurances');
    }
}
