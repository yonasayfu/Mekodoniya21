<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // The testimonial content
            $table->string('author_name'); // Name of the testimonial author
            $table->string('author_role')->nullable(); // Role of the author (e.g., Supporter, Volunteer)
            $table->string('approval_status')->default('pending'); // Approval status (e.g., pending, approved, rejected)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
