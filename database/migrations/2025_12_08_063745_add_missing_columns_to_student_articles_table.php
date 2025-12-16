<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('student_articles', function (Blueprint $table) {
            $table->unsignedInteger('views')->default(0)->after('author');
            $table->boolean('is_featured')->default(false)->after('views');
            $table->boolean('is_active')->default(true)->after('is_featured');
            $table->timestamp('published_at')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_articles', function (Blueprint $table) {
            $table->dropColumn(['views', 'is_featured', 'is_active', 'published_at']);
        });
    }
};
