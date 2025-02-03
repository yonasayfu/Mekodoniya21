<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supporter_id')->constrained('supporters')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email_address');
            $table->string('phone_number');
            $table->string('address')->nullable();

            $table->string('donation_type')->nullable();
            $table->decimal('donation_amount', 10, 2)->nullable();
            $table->string('recurring_interval')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_holder_name')->nullable();

            $table->text('agreement_text')->nullable();
            $table->boolean('terms_and_conditions')->default(false);
            $table->text('additional_comments')->nullable();

            $table->string('original_agreement_pdf')->nullable();
            $table->string('signed_agreement_pdf')->nullable();
            $table->string('bank_form_pdf')->nullable();

            $table->timestamps();
            $table->boolean('public_profile')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_agreements');
    }
};
