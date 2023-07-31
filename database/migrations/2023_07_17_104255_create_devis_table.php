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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50)->nullable();
            $table->string('prenoms', 191)->nullable();
            $table->string('telephone', 50)->nullable();
            $table->string('email', 191)->nullable();
            $table->integer('ville_id')->nullable();
            $table->string('quartier', 191)->nullable();
            $table->integer('prestation_id')->nullable();
            $table->integer('departement_id')->nullable();
            $table->integer('mode_id')->nullable();
            $table->integer('commune_id')->nullable();
            $table->date('date_execution')->nullable();
            $table->time('heure_execution')->nullable();
            $table->longText('description_devis')->nullable();
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
            
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
