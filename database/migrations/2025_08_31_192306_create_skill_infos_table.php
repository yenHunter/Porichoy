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
        Schema::create('skill_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('skill_title');
            $table->string('skill_logo')->nullable();
            $table->double('skill_score', 10, 2)->default(100);
            $table->text('skill_details')->nullable();
            $table->boolean('skill_status')->nullable()->default(true);
            $table->integer('skill_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_infos');
    }
};
