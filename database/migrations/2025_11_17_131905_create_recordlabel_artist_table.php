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
        Schema::create('recordlabel_artist', function (Blueprint $table) {
            
        $table->foreignId('artist_id')->constrained()->onDelete('cascade');
        $table->foreignId('recordlabel_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordlabel_artist');
    }
};
