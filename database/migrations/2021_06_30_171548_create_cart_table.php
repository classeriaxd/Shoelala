<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shoe_id');
            $table->foreignId('user_id');
            $table->foreignId('size_id');
            $table->unsignedInteger('quantity');
            $table->timestamps();
            $table->foreign('shoe_id')->references('shoe_id')->on('shoes');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
        $table->dropForeign('user_id');
        $table->dropForeign('shoe_id');
        $table->dropForeign('size_id');
        
    }
}
