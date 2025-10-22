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
            $table->id();
            $table->string('position');
            $table->string('employment_type');
            $table->string('department')->nullable();
            $table->string('organization');
            $table->string('organization_logo')->nullable();
            $table->string('organization_address')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('location_type')->nullable();
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('experience_infos');
    }
};
