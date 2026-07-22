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
        Schema::create('blog_revisions', function (Blueprint $table) {

            $table->id();

            // Kis blog ka revision hai
            $table->foreignId('blog_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Kis user ne revision create ki
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            // Blog Snapshot
            $table->string('title');
            $table->string('slug');

            $table->text('description');

            $table->string('category');

            $table->integer('read_time')->nullable();

            $table->string('featured_image')->nullable();

            $table->foreignId('featured_media_id')
                  ->nullable()
                  ->constrained('media')
                  ->nullOnDelete();

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

            $table->string('author_name')->nullable();

            // Revision Information
            $table->unsignedInteger('revision_number')->default(1);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_revisions');
    }
};