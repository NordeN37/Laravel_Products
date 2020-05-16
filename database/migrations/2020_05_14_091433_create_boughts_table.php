<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoughtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boughts', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->nullable();
            $table->integer('products_id')->nullable();
            $table->jsonb('sizes')->nullable();
            $table->double('price')->nullable();
            $table->boolean('paid')->default(false);
            $table->boolean('shipped')->default(false);
            $table->bigInteger('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->default('Russia');
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('home')->nullable();
            $table->string('flat')->nullable();
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
        Schema::dropIfExists('boughts');
    }
}
