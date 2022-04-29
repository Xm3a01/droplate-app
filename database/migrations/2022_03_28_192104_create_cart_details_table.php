<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->float('sub_total_price')->nullable();
            $table->float('price')->nullable();
            $table->float('sub_total_purchasing_price')->nullable();
            $table->float('sub_total_vat')->nullable();
            $table->float('sub_total_wholesale_price')->nullable();
            $table->float('purchasing_price')->nullable();
            $table->float('vat')->nullable();
            $table->float('wholesale_price')->nullable();
            $table->foreignId('cart_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('cart_details');
    }
}
