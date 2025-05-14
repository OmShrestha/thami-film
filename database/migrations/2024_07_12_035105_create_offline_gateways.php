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
        Schema::create('offline_gateways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->nullable();
            $table->string('name', '100')->nullable();
            $table->text('short_description')->nullable();
            $table->binary('instructions')->nullable();
            $table->tinyInteger('product_checkout_status')->default(0);
            $table->tinyInteger('course_checkout_status')->default(1);
            $table->integer('serial_number')->default(0);
            $table->tinyInteger('is_receipt')->default(1);
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
        Schema::dropIfExists('offline_gateways');
    }
};
