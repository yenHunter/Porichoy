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
        Schema::create('training_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('training_title');
            $table->foreignId('training_category')->constrained('select_types')->cascadeOnDelete();
            $table->string('training_institute');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('training_location')->nullable();
            $table->string('training_certificate')->nullable();
            $table->text('training_details')->nullable();
            $table->boolean('training_status')->nullable()->default(true);
            $table->integer('training_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_infos');
    }
};
