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
            $table->string('name','70');
            $table->string('author','70');
            $table->integer('sub_category_id')->unsigned();
            $table->string('image','120');
            $table->integer('user_id')->unsigned()->index();
            $table->tinyInteger('viewstatus')->default('1');
            $table->tinyInteger('status')->default('1');
            $table->integer('rental_count')->unsigned()->default('0');
            $table->mediumInteger('lending_duration')->unsigned();
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
