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
    Schema::table('donation_agreements', function (Blueprint $table) {
        $table->string('summary_pdf')->nullable()->after('bank_form_pdf');
    });
}

public function down(): void
{
    Schema::table('donation_agreements', function (Blueprint $table) {
        $table->dropColumn('summary_pdf');
    });
}

};
