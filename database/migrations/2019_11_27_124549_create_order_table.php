<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->integer('product_id');
             $table->integer('transaction_id')->nullable();
             $table->string('payment_method');
             $table->tinyInteger('status');
             $table->integer('total');
             $table->string('billing_address1');
             $table->string('billing_address2');
             $table->string('billing_city');
             $table->string('billing_state');
             $table->string('billing_country');
             $table->integer('billing_zip');
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
