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
            $table->id('user_id');
            $table->string('nickname');
            $table->string('mail')->unique();
            $table->string('password');
            $table->string('name')->null;
            $table->string('gender')->null;
            $table->string('age')->null;
            $table->integer('level')->default(0);
            $table->integer('money')->default(1000);
            $table->integer('win')->default(0);
            $table->integer('lose')->default(0);
            $table->integer('admin')->null;
            $table->string('casino_name')->null;
            $table->string('casino_description')->null;
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
};
