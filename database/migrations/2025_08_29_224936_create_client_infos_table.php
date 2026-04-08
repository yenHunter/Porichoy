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
            $table->uuid('id')->primary();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_mobile')->nullable();
            $table->string('client_picture')->nullable();
            $table->string('client_designation')->nullable();
            $table->string('client_organization')->nullable();
            $table->string('client_address')->nullable();
            $table->string('organization_logo');
            $table->string('organization_website')->nullable();
            $table->boolean('client_status')->default(true);
            $table->integer('client_sequence')->default(0);
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
