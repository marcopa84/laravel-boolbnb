<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->string('cart_code',255)->primary()->required()->unique();
            $table->unsignedBigInteger('ad_id')->required();
            $table->foreign('ad_id')->references('id')->on('ads');
            $table->unsignedBigInteger('apartment_id')->required();
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->dateTime('start_date')->required();
            $table->dateTime('end_date')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
