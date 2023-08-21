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
        Schema::create('depart_modes', function (Blueprint $table) {
            $table->id();
            $table->longText('titre')->nullable();
            $table->string('image_prestation')->nullable();
            $table->integer('departement_id')->nullable();
            $table->integer('mode_departement_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depart_modes');
    }
};
