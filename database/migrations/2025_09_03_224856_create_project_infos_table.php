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
            $table->string('project_slug')->unique();
            $table->string('project_title');
            $table->longText('project_details')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->uuid('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('client_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->uuid('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('service_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('project_location')->nullable();
            $table->text('project_background')->nullable();
            $table->text('project_challenges')->nullable();
            $table->text('project_solution')->nullable();
            $table->boolean('project_status')->default(true);
            $table->smallInteger('project_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
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
