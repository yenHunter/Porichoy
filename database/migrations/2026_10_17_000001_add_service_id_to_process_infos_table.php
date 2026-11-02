<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Attach work-process steps to the service they belong to, so the public
     * service-details page can render them. The existing table already holds
     * title/details/sequence; the link column was never added.
     */
    public function up(): void
    {
        Schema::table('process_infos', function (Blueprint $table) {
            $table->foreignUuid('service_id')
                ->nullable()
                ->index()
                ->after('id')
                ->constrained('service_infos')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('process_infos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('service_id');
        });
    }
};
