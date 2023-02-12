<?php

namespace App\Exports;

use App\Models\Foret;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ForetsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

// ['identifiant','programme','dpef','ccdrf','secteur','foret_ou_perimetre','statut','commune','parcelle','element','sup_ha','strate','calculated_column_1','annee','essence','intervention','details_intervention','observation'];
        return Foret::all([
            'identifiant','region_anef','dpef_anef','ccdrf','secteur','foret_ou_perimetre','statut_juridique','commune','serie','parcelle','strate','annee','essence','intervention','details_intervention','unite','physique','observation'
        ]);
    }
    public function headings():array
    {
        return[
            'id',
            'Region Anef',
            'DPEF Anef',
            'CCDRF',
            'SECTEUR',
            'Forêt ou Périmètre',
            'Statut Juridique',
            'Commune',
            'Série',
            'Parcelle',
            'Strate',
            'Annee',
            'Essence',
            'Intervention',
            'Détails Intervention',
            'unite',
            'physique',
            'Observation'
        ];
    }
}

