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
        Schema::table('tutor_subjects', function (Blueprint $table) {
            if (!Schema::hasColumn('tutor_subjects', 'subject_name')) {
                $table->string('subject_name')->after('tutor_profile_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutor_subjects', function (Blueprint $table) {
            if (Schema::hasColumn('tutor_subjects', 'subject_name')) {
                $table->dropColumn('subject_name');
            }
        });
    }
};
