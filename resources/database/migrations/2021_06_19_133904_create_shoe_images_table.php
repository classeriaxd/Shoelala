<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoe_images', function (Blueprint $table) {
            $table->foreignId('shoe_id');
            $table->string('image');
            $table->foreignId('image_angle_id');
            $table->softDeletes();
            $table->foreign('shoe_id')->references('shoe_id')->on('shoes')->onDelete('cascade');
            $table->foreign('image_angle_id')->references('image_angle_id')->on('image_angles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoe_images');
        $table->dropForeign('shoe_id');
        $table->dropForeign('image_angle_id');
    }
}
