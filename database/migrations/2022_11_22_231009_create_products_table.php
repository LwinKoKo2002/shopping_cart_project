<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->string('product_img');
            $table->string('product_name');
            $table->string('model');
            $table->string('screen_size');
            $table->string('cpu');
            $table->string('storage');
            $table->string('ram');
            $table->string('back_camera');
            $table->string('front_camera');
            $table->string('battery');
            $table->decimal('selling_price', 20, 2);
            $table->string('quantity');
            $table->string('warranty');
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
}
