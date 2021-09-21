<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameBlogPostTagToTaggables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //php artisan make:migration RenameBlogPostTagToTaggables --table=blog_post_tag
    public function up()
    {
        Schema::table('blog_post_tag', function (Blueprint $table) {
            $table->dropForeign(['blog_post_id']);
            $table->dropColumn('blog_post_id');
        });

        Schema::rename('blog_post_tag', 'taggables');

        Schema::table('taggables', function (Blueprint $table) {
            // $table->morphs('taggable');
            $table->unsignedBigInteger('taggable_id')->index();
            $table->string('taggable_type', 100 )->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropColumn('taggable_id');
            $table->dropColumn('taggable_type');
        });

        Schema::rename('taggables', 'blog_post_tag');
        Schema::disableForeignKeyConstraints();

        Schema::table('blog_post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_post_id')->index();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')
                    ->OnDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }
}
