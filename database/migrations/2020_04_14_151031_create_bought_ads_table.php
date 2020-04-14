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
            $table->unsignedBigInteger('id_ad')->required();
            $table->foreign('id_ad')->references('id')->on('ads');
            $table->unsignedBigInteger('id_apartment')->required();
            $table->foreign('id_apartment')->references('id')->on('apartments');
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
