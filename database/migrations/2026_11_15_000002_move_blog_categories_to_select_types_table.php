<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Blog categories used to live in their own `blog_categories` table. They are
 * now `select_types` rows with `use_for = blog_category`, like training
 * categories, so the settings screen and the blog module share one list.
 *
 * Fresh installations never see this: the create_blog_categories migration is
 * gone and `blog_infos.category_id` already points at `select_types`. The work
 * below only runs on a database that still has the old table.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('blog_categories')) {
            return;
        }

        // 0. Somewhere to park the new integer ids while the uuid column lives.
        Schema::table('blog_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id_new')->nullable()->after('category_id');
        });

        // 1. Copy every category across, remembering which new id it became.
        foreach (DB::table('blog_categories')->orderBy('category_sequence')->get() as $old) {
            $new_id = DB::table('select_types')->insertGetId([
                'use_for' => 'blog_category',
                'value' => $old->category_name,
                'details' => $old->category_description,
                'status' => $old->category_status,
                'sequence' => $old->category_sequence,
                'created_at' => $old->created_at,
                'updated_at' => $old->updated_at,
            ]);

            // 2. Repoint the posts that used it, into a temporary column.
            DB::table('blog_infos')
                ->where('category_id', $old->id)
                ->update(['category_id_new' => $new_id]);
        }

        // 3. Swap the uuid column for the integer one and re-point the key.
        Schema::table('blog_infos', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::table('blog_infos', function (Blueprint $table) {
            $table->renameColumn('category_id_new', 'category_id');
        });

        Schema::table('blog_infos', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('select_types')->nullOnDelete();
        });

        // 4. The old table has no readers left.
        Schema::dropIfExists('blog_categories');
    }

    /**
     * Reverse the migrations.
     *
     * The old table is not recreated: its rows now live in `select_types` and
     * are indistinguishable from any other blog category.
     */
    public function down(): void
    {
        DB::table('select_types')->where('use_for', 'blog_category')->delete();
    }
};
