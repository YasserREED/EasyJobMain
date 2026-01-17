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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->cascadeOnDelete()->constrained();

            $table->string('fullname');
            $table->tinyInteger('age')->comment('1=> 18 - 24 , 2=> 25 - 35 , 3=> 36 - 45 , 4=> 46 - 50 , 5 => more than 50');

            $table->string('qualifications');
            $table->string('university');
            $table->string('major');

            $table->date('birthDay');
            $table->tinyInteger('gender')->comment(' 1=> male, 2 => female , 3=> other');
            $table->tinyInteger('socialStatus')->comment(' 1=> single, 2 => married');

            $table->string('nationality');

            $table->string('work')->nullable();
            $table->integer('experince')->nullable();
            $table->string('linkedin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
