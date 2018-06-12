<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('galery_id');
            $table->string('image_link');
            $table->integer('item_order');
            $table->timestamps();

            $table->foreign('galery_id')->references('id')->on('galeries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galery_items');
    }
}
