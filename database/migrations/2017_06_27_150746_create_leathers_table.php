<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leathers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id'); 
            $table->string('name');
            $table->integer('color_id');
            $table->text('description');
            $table->boolean('available')->defualt(0);
            $table->boolean('active')->defualt(0);
            $table->integer('price');

            $table->integer('feature_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leathers');
    }
}
