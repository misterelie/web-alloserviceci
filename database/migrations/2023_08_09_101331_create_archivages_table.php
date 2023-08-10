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
        Schema::create('archivages', function (Blueprint $table) {
            $table->id();
            $table->integer('demande_prestation_id')->nullable();
            $table->integer('devenir_prestataire_id')->nullable();
            $table->integer('departement_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('etat_id')->nullable();
            $table->string('motif_archive')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivages');
    }
};
