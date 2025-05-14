<?php

use App\Models\Topic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id')->default(1);
            $table->string('name');
            $table->tinyInteger('status')->default('1');
            $table->integer('serial_number')->nullable();
            $table->timestamps();
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->foreignIdFor(Topic::class)->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('topic_id');
        });
    }
};
