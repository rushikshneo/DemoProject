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
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('short_description') ;
            $table->text('long_description');   
            $table->float('price')  ;
            $table->float('special_price'); 
            $table->date('special_price_from'); 
            $table->date('special_price_to');   
            $table->enum('status',['0','1']);   
            $table->integer('quanity'); 
            $table->string('meta_title');   
            $table->text('meta_description');  
            $table->text('meta_keywords'); 
            $table->integer('created_by');  
            $table->integer('modify_by')->nullable();   
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
