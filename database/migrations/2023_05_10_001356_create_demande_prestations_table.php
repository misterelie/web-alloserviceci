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
        Schema::create('demande_prestations', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->string('nom', 50)->nullable();
            $table->string('prenoms', 191)->nullable();
            $table->string('telephone');
            $table->foreignId('mode_id')->nullable();
            $table->string('email', 50)->nullable();
            $table->foreignId('prestation_id')->nullable();
            $table->integer('salaire_propose')->nullable()->default(NULL);
            $table->string('age_demande')->nullable()->default(NULL);
            $table->foreignId('ethnie_id')->nullable();
            $table->date('date_demande')->nullable();
            $table->time('heure_demande')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_prestations');
    }
};
