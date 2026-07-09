<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {

            $table->id();

            // Kis user ne upload ki
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Original filename
            $table->string('file_name');

            // Storage path
            $table->string('file_path');

            // image/jpeg
            $table->string('mime_type');

            // Bytes
            $table->unsignedBigInteger('file_size');

            // SEO
            $table->string('alt_text')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};