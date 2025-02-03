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
        if (!Schema::hasColumn('elders', 'photo_url')) {
            Schema::table('elders', function (Blueprint $table) {
                $table->string('photo_url')->nullable()->after('email');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('elders', 'photo_url')) {
            Schema::table('elders', function (Blueprint $table) {
                $table->dropColumn('photo_url');
            });
        }
    }
};
