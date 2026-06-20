<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('blogs', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    
    public function up(): void
{
    Schema::create('blogs', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->string('slug')->unique();

        $table->text('description');
        $table->string('category');

        $table->string('read_time')->nullable();

        $table->longText('content');

        $table->string('featured_image')->nullable();
        $table->string('img_alt')->nullable();

        $table->json('gallery')->nullable();

        $table->string('video')->nullable();
        $table->string('video_url')->nullable();

        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();
        $table->string('focus_keyword')->nullable();

        $table->string('status')->default('draft');

        $table->timestamp('scheduled_at')->nullable();

        $table->string('author')->nullable();

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
