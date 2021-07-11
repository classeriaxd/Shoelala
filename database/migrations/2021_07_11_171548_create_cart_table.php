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
            $table->foreignId('user_id');
            $table->foreignId('stock_id');
            $table->unsignedInteger('quantity');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('stock_id')->references('stock_id')->on('stocks');
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
        $table->dropForeign('stock_id');
        
    }
}
