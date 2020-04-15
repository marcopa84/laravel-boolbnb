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
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('roles');
            $table->string('name');
            $table->string('lastname');
            $table->string('avatar');
            $table->date('date_of_birth');
            $table->string('email')->unique()->required();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->required();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
