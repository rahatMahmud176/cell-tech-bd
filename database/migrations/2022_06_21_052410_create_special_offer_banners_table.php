<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_offer_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header');
            $table->text('description');
            $table->text('image'); 
            $table->float('price', 10,2);
            $table->string('button_text');
            $table->text('button_link');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('special_offer_banners');
    }
};
