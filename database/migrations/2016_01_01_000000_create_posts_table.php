<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->default(1);
            $table->integer('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('DRAFT');
            $table->boolean('featured')->default(0);
            $table->integer('views')->default(1);
            $table->text('multi_images')->nullable();
            $table->text('blockquote')->nullable();
            $table->string('youtube')->nullable();
            $table->string('iframe')->nullable();
            $table->enum('preview', ['IMAGE', 'YOUTUBE'])->default('IMAGE');
            $table->text('result')->nullable();
            $table->string('original_link')->nullable();
            $table->boolean('allow_comments')->default(true);
            $table->timestamp('activate_at')->nullable();
            $table->timestamp('event_start')->nullable();
            $table->timestamps();

            //$table->foreign('author_id')->references('id')->on('users');
        });

        DB::statement("ALTER TABLE posts ADD COLUMN searchtext TSVECTOR");
        DB::statement("UPDATE posts SET searchtext = to_tsvector('russian', title || '' || body)");
        DB::statement("CREATE INDEX searchtext_gin ON posts USING GIN(searchtext)");
        DB::statement("CREATE TRIGGER ts_searchtext BEFORE INSERT OR UPDATE ON posts FOR EACH ROW EXECUTE PROCEDURE tsvector_update_trigger('searchtext', 'pg_catalog.russian', 'title', 'body')");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
        DB::statement("DROP TRIGGER IF EXISTS tsvector_update_trigger ON posts");
        DB::statement("DROP INDEX IF EXISTS searchtext_gin");
        DB::statement("ALTER TABLE posts DROP COLUMN searchtext");
    }
}
