<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forets', function (Blueprint $table) {
            $table->id();
            $table->string("identifiant");  //identifiant programme dpef ccdrf secteur foret_ou_perimetre statut commune parcelle element sup_ha strate calculated_column_1 annee essence intervention details_intervention observation 
            $table->string("region_anef");
            $table->string("dpef_anef")->nullable();
            $table->string("ccdrf");
            $table->string("secteur");
            $table->string("foret_ou_perimetre");
            $table->string("statut_juridique");
            $table->string("commune");
            $table->string("serie")->nullable();
            $table->string("parcelle");
            $table->string("strate")->nullable();
            $table->integer("annee");
            $table->string("essence");
            $table->string("intervention");
            $table->string("details_intervention");
            $table->string("unite");
            $table->string("physique");
            $table->string("observation");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forets');
    }
};
