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
            $table->string('type');
            $table->integer('price')->default(1000000);
            $table->integer('brand_id');
            $table->boolean('is_ready')->default(true);
            $table->string('color');
            $table->string('os');
            $table->string('processor');
            $table->string('graphics');
            $table->string('display');
            $table->string('memory');
            $table->string('storage');
            $table->string('image');
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
