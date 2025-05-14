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
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('slug');
        });

        Schema::table('scategories', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('slug');
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('slug');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('slug');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('slug');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('views_count');
        });

        Schema::table('course_categories', function (Blueprint $table) {
            $table->dropColumn('views_count');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('views_count');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('views_count');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('views_count');
        });
    }
};
