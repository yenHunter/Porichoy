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
        Schema::create('research_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('research_source')->constrained('select_types')->cascadeOnDelete();
            $table->string('research_category');
            $table->string('research_title');
            $table->date('published_date')->nullable();
            $table->string('research_role')->nullable();
            $table->string('research_authors')->nullable();
            $table->string('research_link')->nullable();
            $table->text('research_details')->nullable();
            $table->boolean('research_status')->nullable()->default(true);
            $table->integer('research_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_infos');
    }
};
