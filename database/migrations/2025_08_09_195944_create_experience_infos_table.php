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
        Schema::create('experience_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('employment_position');
            $table->string('employment_type');
            $table->string('employment_department')->nullable();
            $table->string('employment_organization');
            $table->string('organization_logo')->nullable();
            $table->string('organization_address')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('location_type')->nullable();
            $table->longText('employment_details')->nullable();
            $table->boolean('employment_status')->nullable()->default(true);
            $table->integer('employment_sequence')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_infos');
    }
};
