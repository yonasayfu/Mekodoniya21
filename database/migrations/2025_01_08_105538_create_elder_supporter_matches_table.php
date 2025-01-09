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
        Schema::create('elder_supporter_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supporter_id')->constrained('supporters')->onDelete('cascade');
            $table->foreignId('elder_id')->constrained('elders')->onDelete('cascade');
            $table->date('match_date');
            $table->decimal('monthly_contribution_amount', 10, 2);
            $table->string('support_status');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elder_supporter_matches');
    }
};
