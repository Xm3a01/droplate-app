<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->foreignId('user_id')->constrained();
            $table->string('client_phone');
            $table->string('address');
            $table->string('order_status');
            $table->float('delivery_price');
            $table->float('total_vat')->nullable();
            $table->float('total_purchasing_price');
            $table->float('total_selling_price');
            $table->float('wholesale_price')->nullable(); // when prodct ordered


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
        Schema::dropIfExists('orders');
    }
}
