<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
        
            if (!Schema::hasColumn('order_items', 'unit_price_cents')) {
                $table->integer('unit_price_cents')->after('product_id');
            }
            if (!Schema::hasColumn('order_items', 'line_total_cents')) {
                $table->integer('line_total_cents')->after('quantity');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            if (Schema::hasColumn('order_items', 'unit_price_cents')) {
                $table->dropColumn('unit_price_cents');
            }
            if (Schema::hasColumn('order_items', 'line_total_cents')) {
                $table->dropColumn('line_total_cents');
            }
        });
    }
};
