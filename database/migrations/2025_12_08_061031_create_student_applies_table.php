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
        Schema::create('student_applies', function (Blueprint $table) {
            $table->id();
           $table->string('full_name');
            $table->string('line_id')->nullable();
            $table->string('phone');
            $table->enum('tutor_gender', ['ชาย', 'หญิง', 'ไม่จำกัด']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_applies');
    }
};
