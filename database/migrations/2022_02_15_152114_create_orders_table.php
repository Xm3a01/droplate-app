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
            
            $table->string('client_phone');
            $table->string('address');
            $table->string('order_status')->default(2);
            $table->integer('progress')->default(1);
            $table->float('delivery_price');
            $table->float('total_discount')->default(0)->nullable();
            $table->float('total_purchasing_price');
            $table->float('total_selling_price');
            $table->float('total_wholesale_price')->nullable(); // when prodct ordered
            $table->integer('is_payed')->default(0);
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('driver_id')->nullable()->constrained('admins')->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('region_id')->nullable()->constrained()->cascadeOnDelete();
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
