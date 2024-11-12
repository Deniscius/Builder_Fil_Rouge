<?php

// database/migrations/xxxx_xx_xx_add_quantite_to_ressources_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantiteToRessourcesTable extends Migration
{
    public function up()
    {
        Schema::table('ressources', function (Blueprint $table) {
            $table->integer('quantite')->nullable();
        });
    }

    public function down()
    {
        Schema::table('ressources', function (Blueprint $table) {
            $table->dropColumn('quantite');
        });
    }
}
