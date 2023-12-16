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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->integer('accountRole')->default('1');
            $table->integer('accountStatus')->default('1');
            $table->date('registerDate')->nullable();
            $table->string('code')->default('');
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
        Schema::dropIfExists('users');
    }
};
