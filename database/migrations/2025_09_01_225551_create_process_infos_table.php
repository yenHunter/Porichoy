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
        Schema::create('process_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('service_infos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('details');
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
        Schema::dropIfExists('process_infos');
    }
};
