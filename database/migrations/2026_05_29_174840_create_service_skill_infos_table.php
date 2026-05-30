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
        Schema::create('service_skill_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('service_id')->constrained('service_infos')->onDelete('cascade');
            $table->foreignUuid('skill_id')->constrained('skill_infos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_skill_infos');
    }
};
