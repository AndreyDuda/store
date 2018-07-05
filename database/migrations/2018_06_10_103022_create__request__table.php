<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('telephone')->nullable();
            $table->char('email',255)->nullable();
            $table->string('fio',255)->nullable();
            $table->string('country',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('oplata', 255)->nullable();
            $table->string('delivery', 255)->nullable();
            $table->text('product')->nullable();
            $table->text('comment')->nullable();
            $table->integer('new')->nullable();
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
        Schema::dropIfExists('order');
    }
}
