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
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->default(0);
            $table->string('title')->nullable();
            $table->integer('title_font_size')->nullable();
            $table->string('bold_text')->nullable();
            $table->integer('bold_text_font_size')->nullable();
            $table->string('bold_text_color')->nullable();
            $table->string('text')->nullable();
            $table->integer('text_font_size')->nullable();
            $table->string('button_text')->nullable();
            $table->integer('button_text_font_size')->nullable();
            $table->string('button_url')->nullable();
            $table->string('image')->nullable();
            $table->string('side_image', 50)->nullable();
            $table->integer('serial_number')->default(0);
            $table->timestamps();
            $table->string('another_button_text')->nullable();
            $table->integer('another_button_text_font_size')->nullable();
            $table->string('another_button_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
