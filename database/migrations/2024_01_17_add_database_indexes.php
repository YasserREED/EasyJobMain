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
        // Add foreign key indexes and constraints for better performance
        Schema::table('cv_services', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('region');
            $table->index('created_at');
        });

        Schema::table('cv_frees', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('region');
            $table->index('created_at');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->index('user_id');
            $table->index(['tran_ref', 'created_at']);
            $table->unique('tran_ref');
        });

        Schema::table('user_infos', function (Blueprint $table) {
            $table->index('user_id');
        });

        Schema::table('discounts', function (Blueprint $table) {
            $table->index('coupon');
            $table->index('status');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->index('region');
            $table->index('domain');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cv_services', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
            $table->dropIndex(['region']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('cv_frees', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
            $table->dropIndex(['region']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
            $table->dropIndex(['tran_ref', 'created_at']);
            $table->dropUnique(['tran_ref']);
        });

        Schema::table('user_infos', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
        });

        Schema::table('discounts', function (Blueprint $table) {
            $table->dropIndex(['coupon']);
            $table->dropIndex(['status']);
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->dropIndex(['region']);
            $table->dropIndex(['domain']);
        });
    }
};
