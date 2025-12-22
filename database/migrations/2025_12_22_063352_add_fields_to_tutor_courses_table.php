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
        Schema::table('tutor_courses', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('status');
            $table->string('level')->nullable()->after('gender');
            $table->string('school')->nullable()->after('level');
            $table->string('transportation')->nullable()->after('school');
            $table->integer('referral_fee')->nullable()->after('transportation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutor_courses', function (Blueprint $table) {
            $table->dropColumn(['gender', 'level', 'school', 'transportation', 'referral_fee']);
        });
    }
};
