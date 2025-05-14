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
        Schema::create('megamenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id')->nullable()->index('megamenus_language_id_foreign');
            $table->text('menus')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('category')->default(1)->comment('1 - category is active, 0 - category is deactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('megamenus');
    }
};
