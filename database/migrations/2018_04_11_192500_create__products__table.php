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
            $table->string('code',255);
            $table->string('new',255);
            $table->string('title', 255);
            $table->float('price_many');
            $table->float('sale_many');
            $table->float('price_one');
            $table->float('sale_one');
            $table->integer('count');
            $table->string('end_sale', 255);
            $table->string('photo_maine', 255);
            $table->string('photo1', 255);
            $table->string('photo2', 255);
            $table->string('photo3', 255);
            $table->string('photo4', 255);
            $table->string('females', 255);
            $table->string('categories', 255);
            $table->string('sesons', 255);
            $table->string('size', 255);
            $table->string('style', 255);
            $table->string('country', 255);
            $table->string('label', 255);
            $table->text('desc');
            $table->text('meta_title');
            $table->text('meta_desc');
            $table->text('meta_key');
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
