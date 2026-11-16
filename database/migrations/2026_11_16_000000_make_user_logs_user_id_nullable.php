<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Let an activity row outlive the account that produced it.
     *
     * `users` rows are hard-deleted (UserService::delete), while `user_logs`
     * held a plain RESTRICT foreign key, so deleting an operator who had ever
     * acted failed with an integrity-constraint error. Releasing the reference
     * keeps the audit trail and lets the delete succeed, and the page renders
     * those rows as "Deleted user".
     */
    public function up(): void
    {
        Schema::table('user_logs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('user_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migration.
     *
     * The column cannot become NOT NULL again while it still holds released
     * references, so those rows are dropped first.
     */
    public function down(): void
    {
        DB::table('user_logs')->whereNull('user_id')->delete();

        Schema::table('user_logs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('user_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }
};
