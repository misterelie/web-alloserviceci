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
        Schema::create('menage_occasionnels', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('libelle');
            $table->string('images')->nullable();
            $table->longText('details')->nullable();
            $table->integer('prestation_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menage_occasionnels');
    }
};
