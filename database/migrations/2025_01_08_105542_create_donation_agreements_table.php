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
        Schema::create('donation_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supporter_id')->constrained('supporters')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email_address');
            $table->string('phone_number');
            $table->decimal('monthly_donation_amount', 10, 2);
            $table->string('bank_name');
            $table->string('account_number');
            $table->date('preferred_start_date');
            $table->text('agreement_text');
            $table->string('pdf_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_agreements');
    }
};
