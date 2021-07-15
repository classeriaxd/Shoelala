<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('stock_id');
            $table->unsignedInteger('quantity');

            $table->foreign('order_id')->references('order_id')->on('orders');
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
        Schema::dropIfExists('order_items');
        $table->dropForeign('order_id');
        $table->dropForeign('stock_id');

    }
}
