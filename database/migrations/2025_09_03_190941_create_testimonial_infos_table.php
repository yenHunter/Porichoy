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
            $table->uuid('service_id');
            $table->foreign('service_id')->references('id')->on('service_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->uuid('client_id');
            $table->foreign('client_id')->references('id')->on('client_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('details');
            $table->tinyInteger('review');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('testimonial_infos');
    }
};
