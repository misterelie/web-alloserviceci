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
        Schema::create('prestations', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->string('titre_banner')->nullable();
            $table->string('libelle');
            $table->string('image_prestation')->nullable();
            $table->integer('departement_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('mode_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestations');
    }
};
