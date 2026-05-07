<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('blog_excerpt')->nullable();
            $table->longText('blog_content')->nullable();
            $table->string('blog_featured_image')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('keywords')->nullable();
            $table->foreignUuid('category_id')->nullable()->constrained('blog_categories')->onDelete('set null');
            $table->integer('view_count')->default(0);
            $table->dateTime('blog_published')->nullable();
            $table->boolean('blog_status')->default(true);
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
