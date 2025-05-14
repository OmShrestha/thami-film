<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('items_to_display')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);
            $table->integer('item_count')->default(0);
            $table->json('data')->nullable();
            $table->unsignedBigInteger('sectionable_id');
            $table->string('sectionable_type');
            $table->string('design_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
