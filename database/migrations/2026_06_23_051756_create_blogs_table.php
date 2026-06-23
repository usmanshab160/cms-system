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
        Schema::create('blogs', function (Blueprint $table) {

            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('description');

            $table->string('category');

            $table->integer('read_time')->nullable();

            $table->string('featured_image')->nullable();

            $table->string('img_alt')->nullable();

            $table->longText('content');

            $table->string('video')->nullable();

            $table->string('video_url')->nullable();

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->string('focus_keyword')->nullable();

            $table->enum('status', [
                'draft',
                'published',
                'scheduled'
            ])->default('draft');

            $table->timestamp('scheduled_at')->nullable();

            $table->string('author');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};