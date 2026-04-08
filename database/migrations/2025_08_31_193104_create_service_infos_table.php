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
        Schema::create('service_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('service_slug')->unique();
            $table->string('service_title');
            $table->string('service_subtitle')->nullable();
            $table->string('service_icon')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('profile_image')->nullable();
            $table->longText('service_details')->nullable();
            $table->json('service_skills')->nullable();
            $table->boolean('service_status')->nullable()->default(true);
            $table->integer('service_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_infos');
    }
};
