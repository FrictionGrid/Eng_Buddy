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
        Schema::create('tutor_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_profile_id')
                ->constrained('tutor_profiles')
                ->onDelete('cascade');

            $table->boolean('has_teaching_experience')->default(false);
            $table->decimal('teaching_experience_years', 4, 1)->default(0);

            $table->text('work_experience')->nullable();
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_experiences');
    }
};
