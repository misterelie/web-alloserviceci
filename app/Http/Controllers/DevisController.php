<?php

namespace App\Http\Controllers;

use App\Models\Devi;
use App\Models\Mode;
use App\Models\House;
use App\Models\Ville;
use App\Models\Menage;
use App\Models\Commune;
use App\Models\Service;
use App\Models\Assistance;
use App\Models\DepartMode;
use App\Models\Prestation;
use App\Models\Departement;
use Illuminate\Support\Str;
use App\Models\SurfacePiece;
use Illuminate\Http\Request;
use App\Models\SituationLive;
use App\Models\ModePrestation;
use App\Models\ModeDepartement;
use Illuminate\Support\Facades\Auth;

class DevisController extends Controller
{
    //
    public function devis(){
        $houses = House::all();
        $surface_pieces = SurfacePiece::all();
        $situa_houses = SituationLive::all();
        $villes = Ville::all();
        $prestations = Prestation::all();
        $assistances = Assistance::all();
        $communes = Commune::all();
        $services = Service::all();
        $departmodes = DepartMode::all();
        $modedepartements = ModeDepartement::all();
        $departements = Departement::orderBy('created_at')->get();
        return view('newfront.devis', compact('assistances', 'communes', 'modedepartements', 'villes', 'departements', 'prestations', 'services', 'departmodes', 'houses', 'surface_pieces', 'situa_houses'));
    }

    public function getSpecificates(Request $request)
    {
        $mode_departementId = $request->data;
        $modedepartement = ModeDepartement::where('id', $mode_departementId)->first();
        $html = null;
        if(!is_null($modedepartement)){
            $departements = $modedepartement->departements;

            if(!is_null($departements) && $departements->count()){
            $html .= '<select class="form-control" name="departement_id" id="libelle">';
                foreach ($departements as $row) {
                $html .= '<option value="'.$row->id.'">'.Str::ucfirst($row->libelle).'</option>';
                }
                $html .= '</select>';
            }else{
            $html = '<div class="alert alert-danger">Aucune prestation !</div>';
            }
        }else{
            $html = '<div class="alert alert-danger">Veuillez sélectionner une prestation !</div>';
        }
        return json_encode($html);
    }

    public function getCommunes(Request $request)
    {
        $communes = Commune::where('ville_id', '=', $request->id)->get();;
        return response()->json($communes);
    }
   

    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'nullable',
            'ville_id' => 'required',
            'quartier' => 'required',
            'mode_departement_id' => 'required',
            'commune_id' => 'required',
            'date_execution' => 'required',
            'heure_execution' => 'nullable',
            'description_devis' => 'nullable',
            'departement_id' => 'required', 
            'house_id' => 'nullable',
            'nbre_piece' => 'nullable', 
            'surface_piece_id' => 'nullable', 
            'situation_live_id' => 'nullable', 
        ],
        [
            'nom' => 'Le nom est obligation',
            'prenoms' => 'Le prénom est obligation',
            'telephone' => 'Le numéro de téléphone est obligation',
            'ville_id' => 'La ville est obligation',
            'mode_departement_id' => 'Le mode de prestation est obligatoire',
            'commune_id' => 'La commune est obligation',
            'quartier' => 'Le quartier est obligation',
            'date_execution' => 'La date est obligation',
        ]);

        $devis = new Devi();
        $devis->nom = $request->nom;
        $devis->prenoms = $request->prenoms;
        $devis->telephone = $request->telephone;
        $devis->email = $request->email;
        $devis->ville_id = $request->ville_id;
        $devis->quartier = $request->quartier;
        $devis->mode_departement_id = $request->mode_departement_id;
        $devis->commune_id = $request->commune_id;
        $devis->departement_id = $request->departement_id;
        $devis->date_execution = $request->date_execution;
        $devis->heure_execution = $request->heure_execution;
        $devis->house_id = $request->house_id;
        $devis->nbre_piece = $request->nbre_piece;
        $devis->surface_piece_id = $request->surface_piece_id;
        $devis->situation_live_id = $request->situation_live_id;
        $devis->description_devis = $request->description_devis;
        $devis->code = 'DEVIS-'.rand(00001, 99999);
        $devis->save();
        return redirect()->back()->with('success', 'Opération effectuée avec succès !'); 
    }

}
