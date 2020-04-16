<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoughtAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bought_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id')->required();
            $table->foreign('ad_id')->references('id')->on('ads');
            $table->unsignedBigInteger('apartment_id')->required();
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->date('start_date')->required();
            $table->date('end_date')->required();
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
        Schema::dropIfExists('bought_ads');
    }
}
