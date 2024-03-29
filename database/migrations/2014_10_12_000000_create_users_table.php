<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();    
            $table->string('name')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('email')->nullable();
            $table->string('social_id')->nullable();
            $table->integer('is_block')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
