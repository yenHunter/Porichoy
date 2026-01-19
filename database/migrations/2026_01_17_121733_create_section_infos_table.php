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
        Schema::create('section_infos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('theme_id')->constrained('theme_infos')->onDelete('cascade');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('sequence')->default(0);
            $table->boolean('status')->default(true);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_infos');
    }
};
