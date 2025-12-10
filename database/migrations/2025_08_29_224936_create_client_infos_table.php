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
        Schema::create('client_infos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->string('picture')->nullable();
            $table->string('designation')->nullable();
            $table->string('organization')->nullable();
            $table->string('address')->nullable();
            $table->string('logo');
            $table->string('website')->nullable();
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
        Schema::dropIfExists('client_infos');
    }
};
