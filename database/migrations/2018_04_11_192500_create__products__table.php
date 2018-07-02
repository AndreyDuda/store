<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('product_id');
            $table->string('code',255)->nullable();
            $table->string('new',255)->nullable();
            $table->string('title', 255)->nullable();
            $table->float('price_many')->nullable();
            $table->float('sale_many')->nullable();
            $table->float('price_one')->nullable();
            $table->float('sale_one')->nullable();
            $table->integer('count')->nullable();
            $table->string('end_sale', 255)->nullable();
            $table->string('photo_maine', 255)->nullable();
            $table->string('photo1', 255)->nullable();
            $table->string('photo2', 255)->nullable();
            $table->string('photo3', 255)->nullable();
            $table->string('photo4', 255)->nullable();
            $table->string('females', 255)->nullable();
            $table->string('categories', 255)->nullable();
            $table->string('sesons', 255)->nullable();
            $table->string('size', 255)->nullable();
            $table->string('style', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('label', 255)->nullable();
            $table->text('desc')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_key')->nullable();
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
