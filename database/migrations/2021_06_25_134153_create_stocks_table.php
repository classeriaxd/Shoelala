<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id');
            $table->foreignId('shoe_id');
            $table->foreignId('size_id');
            $table->unsignedInteger('stocks')->default('0');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('shoe_id')->references('shoe_id')->on('shoes')->onDelete('cascade');
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
        $table->dropForeign('shoe_id');
        $table->dropForeign('size_id');
        Schema::dropIfExists('stocks');
    }
}
