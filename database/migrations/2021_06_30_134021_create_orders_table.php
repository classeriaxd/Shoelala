<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_uuid')->unique();
            $table->foreignId('user_id');
            $table->timestamp('order_date');
            $table->timestamp('pickup_date');
            $table->unsignedTinyInteger('status');
            $table->date('completed_date')->nullable()->default(NULL);
            $table->foreignId('completed_by')->nullable()->default(NULL);

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('completed_by')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoes');
        $table->dropForeign('user_id');
        $table->dropForeign('completed_by');
    }
}
