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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pd_id')->constrained('personal_details')->onUpdate('cascade')->onDelete('cascade');
            $table->string('type',200);            
            $table->string('bg_title');
            $table->string('title');
            $table->text('desc', 700)->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
