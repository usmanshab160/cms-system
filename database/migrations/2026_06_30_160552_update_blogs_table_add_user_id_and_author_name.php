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
        Schema::table('blogs', function (Blueprint $table) {
           $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('author_name')->nullable();

            $table->dropColumn('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('author')->nullable();

            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'author_name']);
        });
    }
};
