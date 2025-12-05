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
            // Check if columns don't exist before adding
            if (!Schema::hasColumn('tutor_profiles', 'accepted_terms_at')) {
                $table->timestamp('accepted_terms_at')->nullable();
            }
            if (!Schema::hasColumn('tutor_profiles', 'accepted_privacy_at')) {
                $table->timestamp('accepted_privacy_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutor_profiles', function (Blueprint $table) {
            if (Schema::hasColumn('tutor_profiles', 'accepted_terms_at')) {
                $table->dropColumn('accepted_terms_at');
            }
            if (Schema::hasColumn('tutor_profiles', 'accepted_privacy_at')) {
                $table->dropColumn('accepted_privacy_at');
            }
        });
    }
};
