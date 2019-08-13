<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKrasojizdasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krasojizdas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('red_user_id')->nullable();
            $table->unsignedBigInteger('blue_user_id')->nullable();
            $table->string('name')->nullable();
            $table->foreign('red_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('blue_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('krasojizdas');
    }
}
