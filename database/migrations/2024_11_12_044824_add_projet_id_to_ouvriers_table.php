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
        Schema::table('ouvriers', function (Blueprint $table) {
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ouvriers', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
            $table->dropColumn('projet_id');
        });
    }
};
