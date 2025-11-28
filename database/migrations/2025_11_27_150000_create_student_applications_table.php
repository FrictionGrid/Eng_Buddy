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
        Schema::create('student_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('subject');
            $table->enum('tutor_gender', ['ชาย', 'หญิง', 'ไม่จำกัด']);
            $table->enum('status', ['รอตรวจสอบ', 'กำลังดำเนินการ', 'เสร็จสิ้น'])->default('รอตรวจสอบ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_applications');
    }
};
