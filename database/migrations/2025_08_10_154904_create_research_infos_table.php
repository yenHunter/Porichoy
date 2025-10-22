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
            $table->id();
            $table->foreignId('source_id')->constrained('select_types')->cascadeOnDelete();
            $table->string('category');
            $table->string('title');
            $table->date('published')->nullable();
            $table->string('role')->nullable();
            $table->string('authors')->nullable();
            $table->string('link')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('sequence')->default(0);
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
