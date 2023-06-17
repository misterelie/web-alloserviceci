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
        Schema::create('temoignages', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->integer('user_id')->nullable();
            $table->string('nom');
            $table->string('contact', 50)->nullable();
            $table->string('photo_person')->nullable();
            $table->integer('etat')->default(1);
            $table->longText('texte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temoignages');
    }
};
