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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cargo');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('users_recipents', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->unsigned();
            $table->integer('recipents_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
            -> references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('recipents_id')
            -> references('id')
            ->on('recipients')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('users_recipents');
        Schema::dropIfExists('recipients');
    }
};
