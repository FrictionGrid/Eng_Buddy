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
            // ข้อมูลประสบการณ์การสอน
            $table->boolean('has_teaching_experience')->default(false)->after('bio');
            $table->decimal('teaching_experience_years', 4, 1)->default(0)->after('has_teaching_experience');
            $table->text('work_experience')->nullable()->after('teaching_experience_years');
            $table->text('additional_info')->nullable()->after('work_experience');

            // ข้อมูลการยอมรับเงื่อนไข
            $table->timestamp('accepted_terms_at')->nullable()->after('additional_info');
            $table->timestamp('accepted_privacy_at')->nullable()->after('accepted_terms_at');

            // เพิ่ม status 'suspended' ใน enum
            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending')->change();

            // สถานะและการอนุมัติ
            $table->text('rejection_reason')->nullable()->after('status');
            $table->timestamp('approved_at')->nullable()->after('rejection_reason');
            $table->foreignId('approved_by')->nullable()->constrained('users')->after('approved_at');
            $table->timestamp('suspended_at')->nullable()->after('approved_by');

            // Soft Deletes
            $table->softDeletes()->after('suspended_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutor_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'has_teaching_experience',
                'teaching_experience_years',
                'work_experience',
                'additional_info',
                'accepted_terms_at',
                'accepted_privacy_at',
                'rejection_reason',
                'approved_at',
                'approved_by',
                'suspended_at',
                'deleted_at',
            ]);

            // เปลี่ยน status enum กลับไปเป็นเดิม
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->change();
        });
    }
};
