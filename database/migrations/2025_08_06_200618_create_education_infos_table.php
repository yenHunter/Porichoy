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
        Schema::create('education_infos', function (Blueprint $table) {
            $table->id();
            $table->string('degree');
            $table->string('subject')->nullable();
            $table->string('institute');
            $table->string('institute_logo')->nullable();
            $table->string('institute_address')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('result')->nullable();
            $table->longText('details')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('education_infos');
    }
};
