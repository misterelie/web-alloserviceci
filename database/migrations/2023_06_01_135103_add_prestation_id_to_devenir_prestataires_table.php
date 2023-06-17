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
        Schema::table('devenir_prestataires', function (Blueprint $table) {
            $table->integer('prestation_id')->default(NULL)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devenir_prestataires', function (Blueprint $table) {
            //
        });
    }
};
