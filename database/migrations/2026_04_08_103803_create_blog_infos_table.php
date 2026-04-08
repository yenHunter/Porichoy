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
        Schema::create('blog_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('blog_slug')->unique();
            $table->string('blog_title');
            $table->string('blog_subtitle')->nullable();
            $table->string('blog_category')->nullable();
            $table->longText('blog_content')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('profile_image')->nullable();
            $table->boolean('blog_status')->nullable()->default(true);
            $table->integer('blog_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_infos');
    }
};
