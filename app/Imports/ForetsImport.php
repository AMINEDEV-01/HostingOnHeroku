<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Foret;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class ForetsImport implements ToModel, WithHeadingRow
{
//    debut
        public function model(array $row)
        {

                $count_id=DB::table('forets')->count();
                $foret = new Foret([

                        "identifiant" => 'reg/par/int'.($count_id+1),
                        "region_anef" => $row['region_anef']?$row['region_anef']:'',
                        "dpef_anef" => $row['dpef_anef']?$row['dpef_anef']:'',
                        "ccdrf" =>$row['ccdrf']?$row['ccdrf']:'',
                        "secteur" =>$row['secteur']?$row['secteur']:'' ,
                        "foret_ou_perimetre" => $row['foret_ou_perimetre']?$row['foret_ou_perimetre']:'',
                        "statut_juridique" => $row['statut_juridique']?$row['statut_juridique']:'',
                        "commune" => $row['commune']?$row['commune']:'',
                        "serie" => $row['serie']?$row['serie']:'',
                        "parcelle" => $row['parcelle']?$row['parcelle']:'',
                        "strate" => $row['strate']?$row['strate']:'',
                        "annee" => $row['annee']?$row['annee']:'',
                        "essence" => $row['essence']?$row['essence']:'',
                        "intervention" => $row['intervention']?$row['intervention']:'',
                        "details_intervention" => $row['details_intervention']?$row['details_intervention']:'',
                        "unite" => $row['unite']?$row['unite']:'',
                        "physique" => $row['physique']?$row['physique']:'',
                        "observation" => $row['observation']?$row['observation']:'',

                ]);

                return $foret;
        }






// fin
}
