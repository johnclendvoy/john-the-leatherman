<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->text('notes')->nullable();
            $table->string('phone')->nullable();
            $table->integer('total');
            $table->integer('tax');
            $table->integer('stripe_fee');
            $table->string('stripe_id');

            $table->dateTime('shipped_on')->nullable();

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
