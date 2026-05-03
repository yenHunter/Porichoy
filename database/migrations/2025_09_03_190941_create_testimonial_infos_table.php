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
        Schema::create('testimonial_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('client_id');
            $table->foreign('client_id')->references('id')->on('client_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('testimonial_title')->nullable();
            $table->text('testimonial_details');
            $table->tinyInteger('testimonial_review');
            $table->boolean('testimonial_status')->default(true);
            $table->integer('testimonial_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial_infos');
    }
};
