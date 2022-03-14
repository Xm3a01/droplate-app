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
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->text('descripton')->nullable();
            $table->float('purchasing_price')->nullable();
            $table->float('selling_price')->nullable();
            $table->float('vat')->nullable();
            $table->float('wholesale_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('sub_category_id')->nullable()->constrained();
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
