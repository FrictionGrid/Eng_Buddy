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
        Schema::table('tutor_profiles', function (Blueprint $table) {
            if (!Schema::hasColumn('tutor_profiles', 'rejection_reason')) {
                $table->text('rejection_reason')->nullable();
            }
            if (!Schema::hasColumn('tutor_profiles', 'suspended_at')) {
                $table->timestamp('suspended_at')->nullable();
            }
            if (!Schema::hasColumn('tutor_profiles', 'approved_at')) {
                $table->timestamp('approved_at')->nullable();
            }
            if (!Schema::hasColumn('tutor_profiles', 'approved_by')) {
                $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutor_profiles', function (Blueprint $table) {
            if (Schema::hasColumn('tutor_profiles', 'approved_by')) {
                $table->dropForeign(['approved_by']);
                $table->dropColumn('approved_by');
            }
            if (Schema::hasColumn('tutor_profiles', 'approved_at')) {
                $table->dropColumn('approved_at');
            }
            if (Schema::hasColumn('tutor_profiles', 'suspended_at')) {
                $table->dropColumn('suspended_at');
            }
            if (Schema::hasColumn('tutor_profiles', 'rejection_reason')) {
                $table->dropColumn('rejection_reason');
            }
        });
    }
};
