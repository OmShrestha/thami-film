<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('basic_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('language_id')->default(1);
            $table->string('name')->unique();
            $table->text('value')->nullable();
            $table->string('type')->nullable();
            $table->boolean('active')->default(1);

            //Indexes
            $table->index('name', 'name_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_settings');
    }
};
