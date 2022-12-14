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
            $table->bigInteger('cate_id');
            $table->string('name');
            $table->string('type');
            $table->bigInteger('brand_id')->nullable();
            $table->mediumText('small_description');
            $table->longText('description');
            $table->string('original_price');
            $table->bigInteger('selling_price');
            $table->string('image');
            $table->string('qty');
            $table->string('tax');
            $table->string('discount')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('trending')->default(0);
            $table->tinyInteger('new_arrival')->default(0);
            $table->mediumText('meta_title');
            $table->mediumText('meta_keywords');
            $table->mediumText('meta_description');
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
