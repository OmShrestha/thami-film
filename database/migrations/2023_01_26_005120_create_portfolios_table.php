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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->default(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('start_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('client_name')->nullable();
            $table->text('tags')->nullable();
            $table->string('featured_image')->nullable();
            $table->integer('service_id')->nullable();
            $table->binary('content')->nullable();
            $table->string('status', 20)->nullable();
            $table->tinyInteger('feature')->default(0)->comment('0 - will not show in home, 1 - will show in home');
            $table->integer('serial_number')->default(0);
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('website_link')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
};
