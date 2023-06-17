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
        Schema::create('assistances', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->string('telephone1', 50)->nullable();
            $table->string('telephone2', 50)->nullable();
            $table->string('telephone3', 50)->nullable();
            $table->string('whatsapp', 50)->nullable();
            $table->string('email', 191)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistances');
    }
};
