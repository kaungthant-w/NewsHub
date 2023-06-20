<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('newsposts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('user_id');
            $table->string('news_title');
            $table->string('news_title_slug');
            $table->string('image');
            $table->text('news_details');
            $table->text('tags');
            $table->integer('breaking_news');
            $table->integer('top_slider');
            $table->integer('first_section_three');
            $table->integer('first_section_eight');
            $table->string('post_date');
            $table->string('post_month');
            $table->integer('status')->default(1);
            $table->integer('view_count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('newsposts');
    }
};
