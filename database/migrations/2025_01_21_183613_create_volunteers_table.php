<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the volunteer
            $table->integer('age'); // Age of the volunteer
            $table->string('gender'); // Gender of the volunteer
            $table->string('address'); // Address of the volunteer
            $table->string('phone_number'); // Contact number of the volunteer
            $table->string('email'); // Email of the volunteer
            $table->text('skills')->nullable(); // Skills of the volunteer
            $table->string('status')->default('pending'); // Status (e.g., pending, active, inactive)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
};
