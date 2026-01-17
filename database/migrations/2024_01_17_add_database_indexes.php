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
        // Add performance indexes for frequently queried columns
        // Only add indexes that don't already exist in create table migrations

        Schema::table('cv_services', function (Blueprint $table) {
            // user_id index already exists from foreignId()
            $table->index('region');
            $table->index('created_at');
        });

        Schema::table('cv_frees', function (Blueprint $table) {
            // user_id index already exists from foreignId()
            $table->index('region');
            $table->index('created_at');
        });

        Schema::table('payments', function (Blueprint $table) {
            // user_id index already exists from foreignId()
            // tran_ref unique constraint already exists in create_payments_table
            $table->index(['tran_ref', 'created_at']);
        });

        // user_infos: user_id index already exists from foreignId(), no additional indexes needed

        Schema::table('discounts', function (Blueprint $table) {
            // coupon index already exists in create_discounts_table migration
            $table->index('status');
        });

        Schema::table('companies', function (Blueprint $table) {
            // region index already exists in create_companies_table migration
            $table->index('domain');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cv_services', function (Blueprint $table) {
            $table->dropIndex(['region']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('cv_frees', function (Blueprint $table) {
            $table->dropIndex(['region']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['tran_ref', 'created_at']);
        });

        Schema::table('discounts', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->dropIndex(['domain']);
        });
    }
};
