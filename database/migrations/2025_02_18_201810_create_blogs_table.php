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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pd_id')->constrained('personal_details')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('blog_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->text('desc');
            $table->string('image');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
