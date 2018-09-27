<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product__requests', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('lent_user')->unsigned();
            $table->integer('borrow_user')->unsigned();
            $table->integer('product_id')->index();
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('viewstatus')->default('0');
            $table->string('date_borrowal','30')->nullable();
            $table->string('due_date','30')->nullable();
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
        Schema::dropIfExists('product__requests');
    }
}
