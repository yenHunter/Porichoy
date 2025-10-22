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
            $table->id();
            $table->foreignId('service_id')->constrained('service_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('client_id')->constrained('client_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('details');
            $table->tinyInteger('review');
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
        Schema::dropIfExists('testimonial_infos');
    }
};
