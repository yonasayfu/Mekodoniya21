<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supporter_id')->constrained('supporters')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->decimal('total_needed', 10, 2)->nullable(); // Make nullable if needed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
