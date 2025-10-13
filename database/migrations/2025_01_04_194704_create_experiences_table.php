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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company')->nullable();
            $table->string('business')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->boolean('is_continue')->default(false);
            $table->string('exp_area')->nullable();
            $table->integer('exp_area_year')->default(0);
            $table->string('location')->nullable();
            $table->string('responsibilities')->nullable();
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
        Schema::dropIfExists('experiences');
    }
};
