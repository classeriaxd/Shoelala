<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->id('shoe_id');
            $table->string('name');
            $table->foreignId('category_id');
            $table->foreignId('brand_id');
            $table->foreignId('type_id');
            $table->string('sku')->unique();
            $table->unsignedInteger('price');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('brand_id')->references('brand_id')->on('brands')
            ->onDelete('cascade');
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
        Schema::dropIfExists('shoes');
        $table->dropForeign('category_id');
        $table->dropForeign('brand_id');
        $table->dropForeign('type_id');
    }
}
