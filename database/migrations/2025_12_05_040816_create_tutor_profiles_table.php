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
        Schema::create('tutor_profiles', function (Blueprint $table) {
            $table->id();
                        $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');

            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();

            $table->string('id_card_image');
            $table->text('bio')->nullable();

            // Teaching Experience
            $table->boolean('has_teaching_experience')->default(false);
            $table->decimal('teaching_experience_years', 4, 1)->default(0);
            $table->text('work_experience')->nullable();
            $table->text('additional_info')->nullable();

            // Terms and Privacy
            $table->timestamp('accepted_terms_at')->nullable();
            $table->timestamp('accepted_privacy_at')->nullable();

            // Approval Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_profiles');
    }
};
