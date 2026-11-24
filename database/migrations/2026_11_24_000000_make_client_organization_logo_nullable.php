<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The organization logo is optional: the element lets an admin remove it
     * (and undo the removal) like every other module's logo, and its model
     * falls back to a placeholder. Existing rows keep their current value.
     */
    public function up(): void
    {
        Schema::table('client_infos', function (Blueprint $table) {
            $table->string('organization_logo')->nullable()->change();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Schema::table('client_infos', function (Blueprint $table) {
            $table->string('organization_logo')->nullable(false)->change();
        });
    }
};
