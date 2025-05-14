<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id')->default(0);
            $table->integer('scategory_id')->nullable();
            $table->string('main_image')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->binary('content')->nullable();
            $table->text('summary')->nullable();
            $table->integer('serial_number')->default(0);
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('feature')->default(0)->comment('0 - will not show in home, 1 - will show in home');
            $table->tinyInteger('details_page_status')->default(1)->comment('1 - enable, 0 - disable');
            $table->tinyInteger('sidebar')->default(1)->comment('1 - enable, 0 - disable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
