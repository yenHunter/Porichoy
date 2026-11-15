<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * The lookup screens order their rows by drag/drop, like the module pages
     * do, so every select-type row needs a sequence within its `use_for` group.
     */
    public function up(): void
    {
        Schema::table('select_types', function (Blueprint $table) {
            $table->integer('sequence')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('select_types', function (Blueprint $table) {
            $table->dropColumn('sequence');
        });
    }
};
