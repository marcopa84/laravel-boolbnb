<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('title')->required();
            $table->text('description')->required();
            $table->unsignedTinyInteger('rooms_number')->required();
            $table->unsignedTinyInteger('beds_number')->required();
            $table->unsignedTinyInteger('bathrooms_number')->required();
            $table->integer('size')->required();
            $table->string('address')->required();
            $table->double('latitude')->required();
            $table->double('longitude')->required();
            $table->string('featured_image')->required();
            $table->float('price', 6, 2)->required();
            $table->boolean('visible')->required();
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
        Schema::dropIfExists('apartments');
    }
}
