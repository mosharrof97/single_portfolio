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
        Schema::create('professional_certifications', function (Blueprint $table) {
            $table->id();           
            $table->string('certification');
            $table->string('institute');
            $table->text('desc',500)->nullable();
            $table->string('location')->nullable();
            $table->string('country');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('professional_certifications');
    }
};
