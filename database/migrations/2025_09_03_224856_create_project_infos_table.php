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
        Schema::create('project_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug')->unique();
            $table->string('title');
            $table->longText('details')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->foreignId('client_id')->nullable()->constrained('client_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->uuid('service_id')->nullable();
            $table->string('location')->nullable();
            $table->text('background')->nullable();
            $table->text('challenges')->nullable();
            $table->text('solution')->nullable();
            $table->boolean('status')->default(true);
            $table->smallInteger('sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('service_infos')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_infos');
    }
};
