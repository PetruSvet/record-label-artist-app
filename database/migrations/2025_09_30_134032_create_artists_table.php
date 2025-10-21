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
    Schema::create('artists', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->string('name');
        $table->string('genre')->nullable();
        $table->year('debut_year')->nullable();
        $table->string('social_media_handle')->nullable();
        $table->timestamps();
        $table->string('profile_picture')->nullable();
        $table->string('description')->nullable();
        $table->string('embed')->nullable();
    });
}

public function down(): void
{
    Schema::dropIfExists('artists');
}

};
