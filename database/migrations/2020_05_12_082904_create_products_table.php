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
            $table->integer('author_id');
            $table->string('name')                                  ->nullable();
            $table->double('price')                                 ->nullable();
            $table->jsonb('sizes')                                  ->nullable();
            $table->boolean('allow_sale')                           ->default(false);
            $table->integer('sale')                                 ->nullable();
            $table->double('assessment')                            ->nullable();
            $table->integer('category_id')                          ->nullable();
            $table->string('title')                                 ->nullable();
            $table->string('seo_title')                             ->nullable();
            $table->text('body')                                    ->nullable();
            $table->string('image_one')                             ->nullable();
            $table->string('image_two')                             ->nullable();
            $table->string('image_three')                           ->nullable();
            $table->string('image_four')                            ->nullable();
            $table->string('slug')                                  ->unique();
            $table->text('meta_description')                        ->nullable();
            $table->text('meta_keywords')                           ->nullable();
            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('DRAFT');
            $table->integer('views')                                ->default(1);
            $table->string('youtube')                               ->nullable();
            $table->string('iframe')                                ->nullable();
            $table->enum('preview', ['IMAGE', 'YOUTUBE', 'BLOCKQUOTE'])->default('IMAGE');
            $table->timestamp('activate_at')                        ->nullable();
            $table->timestamp('event_start')                        ->nullable();
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
        Schema::drop('products');
    }
}
