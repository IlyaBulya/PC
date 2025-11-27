<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('name');
        });

        // Backfill slugs for existing products
        $products = DB::table('products')->select('id', 'name')->get();
        $used = [];
        foreach ($products as $p) {
            $base = Str::slug((string)$p->name) ?: 'product-'.$p->id;
            $slug = $base;
            $i = 2;
            while (DB::table('products')->where('slug', $slug)->exists() || isset($used[$slug])) {
                $slug = $base.'-'.$i;
                $i++;
            }
            $used[$slug] = true;
            DB::table('products')->where('id', $p->id)->update(['slug' => $slug]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
