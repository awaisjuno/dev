<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detail', function (Blueprint $table) {
            $table->id('user_detail_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('FirstName');
            $table->string('LastName');
            $table->integer('mobile');
            $table->string('cnicNumber');
            $table->unsignedBigInteger('professionId');
            $table->foreign('career_id')->references('id')->on('career');
            $table->string('description');
            $table->string('headLine');
            $table->unsignedBigInteger('cityId');
            $table->foreign('city_id')->references('id')->on('city');
            $table->string('idCard');
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->integer('menterBage')->default('0');
            $table->string('code');
            $table->enum('isActive', ['0', '1'])->default('1');
            $table->enum('isDelete', ['0', '1'])->default('0');
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
        Schema::dropIfExists('user_detail');
    }
};
