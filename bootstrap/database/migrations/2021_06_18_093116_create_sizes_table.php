<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id('size_id');
            $table->foreignId('type_id');
            $table->float('us', 4,1);
            $table->float('eur', 4,1);
            $table->float('uk', 4,1);
            $table->float('cm', 4,1);

            $table->foreign('type_id')->references('type_id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
        $table->dropForeign('type_id');
    }
}
