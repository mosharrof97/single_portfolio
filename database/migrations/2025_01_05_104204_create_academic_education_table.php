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
        Schema::create('academic_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pd_id')->constrained('personal_details')->onUpdate('cascade')->onDelete('cascade');
            $table->string('edu_level');
            $table->string('exam_title');
            $table->string('major_group');
            $table->string('exam_board')->nullable();
            $table->string('institute_name');
            $table->boolean('is_foreign_inst')->default(false);
            $table->string('foreign_country')->nullable();
            $table->string('result');
            $table->string('marks')->nullable();
            $table->string('CGPA')->nullable();
            $table->string('scale')->nullable();
            $table->string('passing_year');
            $table->string('edu_duration')->nullable();
            $table->string('achievement')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_education');
    }
};
