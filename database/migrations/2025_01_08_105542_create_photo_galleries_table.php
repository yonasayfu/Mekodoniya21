<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('photo_url'); // URL of the photo
            $table->text('description')->nullable(); // Optional description
            $table->morphs('imageable'); // Adds `imageable_id` and `imageable_type` columns
            $table->timestamps();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('photo_galleries');
    }
};
