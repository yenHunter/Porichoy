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
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('blog_id')->constrained('blog_infos')->onDelete('cascade');
            $table->string('commenter_name');
            $table->string('commenter_image')->nullable();
            $table->string('commenter_email')->nullable();
            $table->text('comment_text');
            $table->boolean('is_reply')->default(false);
            $table->boolean('comment_status')->default(false); // false = pending, true = approved
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_comments');
    }
};
