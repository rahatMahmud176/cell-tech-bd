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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->float('price', 10,2);
            $table->float('sell_price', 10,2);
            $table->text('short_description');
            $table->text('image');
            $table->text('description');
            $table->tinyInteger('status')->default('1');
            $table->integer('hit_count')->default('0');
            $table->integer('sell_count')->default('0');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('products');
    }
};
