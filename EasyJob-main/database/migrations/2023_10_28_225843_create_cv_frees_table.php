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
        Schema::create('cv_frees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->cascadeOnDelete()->constrained();

            $table->string('subject');
            $table->tinyInteger('region')->comment(' 1=> Central Region, 2 => Western Region , 3=> Eastern Province');

            $table->string('domain');

            $table->string('cv_file');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_frees');
    }
};
