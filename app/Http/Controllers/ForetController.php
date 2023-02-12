<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Foret;
use App\Exports\ForetsExport;
use App\Imports\ForetsImport;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ForetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function index()
    {
        $forets =DB::table('forets')->paginate(10);

        if (request()->ajax()) {

            $data = DB::table('forets')
                ->get();
            if(auth()->user()->role_id == 1){
            return datatables()->of($data)
            
                ->addColumn('action', function ($foret) {
        
                
                return '<td style="display: flex">
                <div style="display: inline-flex">
                <a href= "' . route('forets.edit', ['foret' => $foret->id]) .'"
                    class="btn btn-primary m-2">
                    <i class="fa fa-pen"></i>
                </a>
                <form action="'.route('forets.destroy', ['foret' => $foret->id]) .'" method="post">
                    '.csrf_field().'
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger m-2">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                </div>
            </td>
            ';

                })

                ->rawColumns(['action'])
            
                ->make(true);}
                else{

                    return datatables()->of($data)

                    ->addColumn('action', function ($foret) {
        
                
                        return '';
        
                        })
        
                        ->rawColumns(['action'])
                    
                        ->make(true);
                    
                    


                }
        }

     
                
        
        return view('forets.index', ['forets' => $forets]);
    }
    
    /**
     * Create Bancaire 
     * @param 
     * @return Array $bancaire
     * @author  Amine ELMANSOURI
     */
    public function create()
    {
        
        // return redirect()->back()
        // ->with('error','username is invalid')
        // ->withInput();
        return view('forets.add');
    }

    /**
     * Store Bancaire
     * @param Request $request
     * @return View Bancaire
     * @author  Amine ELMANSOURI
     */
    public function store(Request $request)
    {
        // Validations
        //nr_de_reglement date mode reference date_echeance montant_regle code_client

        //identifiant region_anef dpef_anef ccdrf secteur foret_ou_perimetre statut_juridique commune parcelle element sup_ha strate calculated_column_1 annee essence intervention details_intervention observation 
        $count_id=DB::table('forets')->count();
        $request->validate([
            'region_anef'     => 'required',
            'dpef_anef'     => 'required',
            'ccdrf'     => 'required',
            'secteur'     => 'required',
            'foret_ou_perimetre'     => 'required',
            'statut_juridique'     => 'required',
            'commune'     => 'required',
            'serie'     => 'required',
            'parcelle'     => 'required',
            'strate'     => 'required',
            'annee'     => 'required',
            'essence'     => 'required',
            'intervention'     => 'required',
            'unite'     => 'required',
            'physique'     => 'required',

            
        ]);

        DB::beginTransaction();
        try {

            // Store Data
//identifiant region_anef dpef_anef ccdrf secteur foret_ou_perimetre statut_juridique commune parcelle element sup_ha strate calculated_column_1 annee essence intervention details_intervention observation 
        
            $foret = Foret::create([
                'identifiant'    => 'reg/par/int'.($count_id+1),
                'region_anef'         => $request->region_anef,
                'dpef_anef' => $request->dpef_anef,
                'ccdrf' => $request->ccdrf,
                'secteur' => $request->secteur,
                'foret_ou_perimetre' => $request->foret_ou_perimetre,
                'statut_juridique' => $request->statut_juridique,
                'commune' => $request->commune,
                'serie' => $request->serie?$request->serie:'',
                'parcelle' => $request->parcelle,
                'strate' => $request->strate,
                'annee' => $request->annee,
                'essence' => $request->essence,
                'intervention' => $request->intervention,
                'details_intervention' => $request->details_intervention,
                'unite' => $request->unite,
                'physique' => $request->physique,
                'observation' => $request->observation?$request->observation:'',
                
            ]);
        
            

            

            // Commit And Redirected To Listing
            DB::commit();
            
            return redirect()->route('forets.index')->with('success','Data Created Successfully.');
        
        }
            
            

         catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

  
    

    /**
     * Edit Bancaire
     * @param Integer $bancaire
     * @return Collection $bancaire
     * @author  Amine ELMANSOURI
     */
    public function edit(Foret $foret)
    {
        
        return view('forets.edit')->with([
            'foret'  => $foret
        ]);
    }

    /**
     * Update Bancaire
     * @param Request $request, Bancaire $bancaire
     * @return View Bancaires
     * @author  Amine ELMANSOURI
     */
    public function update(Request $request, Foret $foret)
    {
        // Validations
        $count_id=DB::table('forets')->count();
        $request->validate([
            'region_anef'     => 'required',
            'dpef_anef'     => 'required',
            'ccdrf'     => 'required',
            'secteur'     => 'required',
            'foret_ou_perimetre'     => 'required',
            'statut_juridique'     => 'required',
            'commune'     => 'required',
            'serie'     => 'required',
            'parcelle'     => 'required',
            'strate'     => 'required',
            'annee'     => 'required',
            'essence'     => 'required',
            'intervention'     => 'required',
            'unite'     => 'required',
            'physique'     => 'required',

            
        ]);

        DB::beginTransaction();
        try {
          
            // Store Data
            $foret_updated = Foret::whereId($foret->id)->update([
                'identifiant'    => 'reg/par/int'.($count_id+1),
                'region_anef'         => $request->region_anef,
                'dpef_anef' => $request->dpef_anef,
                'ccdrf' => $request->ccdrf,
                'secteur' => $request->secteur,
                'foret_ou_perimetre' => $request->foret_ou_perimetre,
                'statut_juridique' => $request->statut_juridique,
                'commune' => $request->commune,
                'serie' => $request->serie,
                'parcelle' => $request->parcelle,
                'strate' => $request->strate,
                'annee' => $request->annee,
                'essence' => $request->essence,
                'intervention' => $request->intervention,
                'details_intervention' => $request->details_intervention,
                'unite' => $request->unite,
                'physique' => $request->physique,
                'observation' => $request->observation?$request->observation:'',
            ]);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('forets.index')->with('success','Data Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Delete Bancaire
     * @param Bancaire $bancaire
     * @return Index Bancaires
     * @author Amine ELMANSOURI
     */
    public function delete(Foret $foret)
    {
        DB::beginTransaction();
        try {
            // Delete Bancaire
            Foret::whereId($foret->id)->delete();

            DB::commit();
            return redirect()->route('forets.index')->with('success', 'Data Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Import Bancaires 
     * @param Null
     * @return View File
     */
    public function importForets()
    {
        return view('forets.import');
    }

    public function uploadForets(Request $request)
    {
        Excel::import(new ForetsImport, $request->file);
        
        return redirect()->route('forets.index')->with('success', 'Data Imported Successfully');
    }

    public function export() 
    {
        return Excel::download(new ForetsExport, 'forets.xlsx');
    }



    




















    //  end
}
