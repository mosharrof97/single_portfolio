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
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('religion');
            $table->string('married_status');
            $table->string('nationality');
            $table->string('national_id', 20)->nullable();
            $table->string('passport_no')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('country_code')->nullable();
            $table->string('mobile', 15)->nullable(); // Make nullable if mobile isn't required
            $table->string('mobile_home', 15)->nullable()->default('N/A'); // Changed to nullable if mobile_home is optional
            $table->string('mobile_office', 15)->nullable()->default('N/A'); // Changed to nullable if mobile_office is optional
            $table->string('email');
            $table->string('extra_email')->nullable()->default('N/A'); // Changed to nullable for extra_email
            $table->string('blood_group')->nullable()->default('N/A'); // Nullable for blood_group
            $table->string('height')->nullable()->default('N/A'); // Nullable for height
            $table->string('weight')->nullable()->default('N/A'); // Nullable for weight
            $table->string('slug');
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
        Schema::dropIfExists('personal_details');
    }
};
