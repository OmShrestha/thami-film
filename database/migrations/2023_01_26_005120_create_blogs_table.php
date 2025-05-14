<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->default(0);
            $table->integer('bcategory_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('main_image')->nullable();
            $table->text('excerpt')->nullable();
            $table->binary('content')->nullable();
            $table->tinyInteger('sidebar')->default(1)->comment('1 - enabled, 0 - disabled');
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('alt_text')->nullable();
            $table->text('image_description')->nullable();
            $table->bigInteger('views_count')->default(0);
            $table->boolean('breaking_news')->default(false);
            $table->integer('serial_number')->default(1);
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
        Schema::dropIfExists('blogs');
    }
};
