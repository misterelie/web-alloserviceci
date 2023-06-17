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
        Schema::create('devenir_prestataires', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->string('nom')->default(NULL)->nullable();;
            $table->string('prenoms')->default(NULL)->nullable();;
            $table->string('civilite')->default(NULL)->nullable();;
            $table->string('date_naiss')->default(NULL)->nullable();
            $table->string('situation_matri')->nullable();
            $table->integer('nbre_enfant')->default(0)->nullable();
            $table->string('telephone1', 50)->nullable();
            $table->string('telephone2', 50)->default(NULL)->nullable();
            $table->string('whatsapp', 50)->default(NULL)->nullable();
            $table->string('email', 191)->default(NULL)->nullable();
            $table->foreignId('ethnie_id', 191)->nullable();
            $table->foreignId('commune_id')->nullable();
            $table->string('quartier')->default(NULL)->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('domaine_id')->nullable()->default(NULL);
            $table->string('annee_experience')->default(NULL)->nullable();;
            $table->float('pretention_salairiale')->nullable();
            $table->string('zone')->default(NULL)->nullable();
            $table->string('contact_urgence')->default(NULL)->nullable();
            $table->string('reference')->default(NULL)->nullable();
            $table->string('contact_reference')->default(NULL)->nullable();
            $table->integer('alphabet_id')->default(NULL)->nullable();
            $table->integer('diplome_id')->default(NULL)->nullable();
            $table->foreignId('mode_id')->default(NULL)->nullable();
            $table->foreignId('dispo_id')->default(NULL)->nullable();
            $table->foreignId('piece_id')->nullable();
            $table->string('numero_piece')->default(NULL)->nullable();
            $table->foreignId('canal_id')->default(NULL)->nullable();
            $table->string('copy_piece')->default(NULL)->nullable();
            $table->string('copy_last_diplome')->nullable();
            $table->string('catalogue_realisa')->nullable();
            $table->text('avis')->default(NULL)->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devenir_prestataires');
    }
};
