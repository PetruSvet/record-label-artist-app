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
        $table->unsignedBigInteger('label_id'); // Foreign key to RecordLabel
        $table->string('social_media_handle')->nullable();
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('label_id')->references('id')->on('record_labels')->onDelete('cascade');
    });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
