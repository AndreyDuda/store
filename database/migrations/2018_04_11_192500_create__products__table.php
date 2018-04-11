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
            $table->integer('1c_id');
            $table->string('code',255);
            $table->string('title', 255);
            $table->float('price_many');
            $table->float('price_one');
            $table->integer('count');
            $table->string('photo', 255);
            $table->text('desc');
            $table->text('meta_title');
            $table->text('meta_desc');
            $table->text('meta_key');
            $table->integer('sale');
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
