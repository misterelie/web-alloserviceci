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
        Schema::create('diplomes', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->string('diplome')->default(NULL)->nullable();
            $table->integer('updated_by')->nullable()->default(NULL);
            $table->boolean('deleted')->default(FALSE)->nullable();
            $table->integer('statut')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomes');
    }
};
