<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained()->onDelete('cascade');
            $table->string('nomRessource');
            $table->text('description')->nullable();
            $table->integer('quantite_initiale')->default(0); // Quantité initiale
            $table->timestamps();
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
