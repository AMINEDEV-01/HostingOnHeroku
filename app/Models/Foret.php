<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foret extends Model
{
//identifiant,programme,dpef,ccdrf,secteur foret_ou_perimetre,statut,commune,parcelle,element,sup_ha,strate,calculated_column_1,annee,essence,intervention,details_intervention,observation 
       
    protected $table='forets';
    protected $primaryKey ='id';
    protected $fillable=['identifiant','region_anef','dpef_anef','ccdrf','secteur','foret_ou_perimetre','statut_juridique','commune','serie','parcelle','strate','annee','essence','intervention','details_intervention','unite','physique','observation'];
}
