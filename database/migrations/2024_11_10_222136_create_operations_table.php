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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->decimal('montant', 10, 2);
            $table->date('dateOperation');
            $table->string('description')->nullable();
            $table->string('nomOperation')->nullable(); // Ajoutez ce champ si nécessaire
            $table->timestamps();

            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('set null');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
