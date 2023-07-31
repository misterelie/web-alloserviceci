<?php

namespace App\Http\Controllers;

use App\Models\Devi;
use App\Models\Menage;
use App\Models\Commune;
use App\Models\Assistance;
use App\Models\Departement;
use App\Models\Mode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ModePrestation;
use App\Models\Prestation;
use App\Models\Ville;
use Illuminate\Support\Facades\Auth;

class DevisController extends Controller
{
    //
    public function devis(){
        $villes = Ville::all();
        $prestations = Prestation::all();
        $assistances = Assistance::all();
        $communes = Commune::all();
        $modes = Mode::all();
        $departements = Departement::orderBy('created_at')->limit(3)->get();
        return view('newfront.devis', compact('assistances', 'communes', 'modes', 'villes', 'departements', 'prestations'));
    }

    public function getSpecificates(Request $request)
    {
        $modeId = $request->data;
        $mode = Mode::where('id', $modeId)->first();
        $html = null;
        if(!is_null($mode)){
            $prestations = $mode->prestations;

            if(!is_null($prestations) && $prestations->count()){
            $html .= '<select class="form-control" name="prestation_id" id="libelle">';
                foreach ($prestations as $row) {
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
            'mode_id' => 'required',
            'mode_id' => 'required',
            'commune_id' => 'required',
            'date_execution' => 'required',
            'heure_execution' => 'required',
            'description_devis' => 'required',
            'prestation_id' => 'nullable'
        ],
        [
            'nom' => 'Le nom est obligation',
            'prenoms' => 'Le prénom est obligation',
            'telephone' => 'Le numéro de téléphone est obligation',
            'ville_id' => 'La ville est obligation',
            'mode_id' => 'Le mode de prestation est obligatoire',
            'commune_id' => 'La commune est obligation',
            'quartier' => 'Le quartier est obligation',
            'date_execution' => 'La date est obligation',
            'heure_execution' => 'Ce champ est obligation',
            'description_devis' => 'Ce champ est obligation',
        ]);

        $devis = new Devi();
        $devis->nom = $request->nom;
        $devis->prenoms = $request->prenoms;
        $devis->telephone = $request->telephone;
        $devis->email = $request->email;
        $devis->ville_id = $request->ville_id;
        $devis->quartier = $request->quartier;
        $devis->mode_id = $request->mode_id;
        $devis->mode_id = $request->mode_id;
        $devis->commune_id = $request->commune_id;
        $devis->prestation_id = $request->prestation_id;
        $devis->date_execution = $request->date_execution;
        $devis->heure_execution = $request->heure_execution;
        $devis->description_devis = $request->description_devis;
        $devis->code = 'DEVIS-'.rand(00001, 99999);
        $devis->slug = Str::slug(Auth::user()->name.'-'.rand(00001, 99999));
        $devis->save();
        return redirect()->back()->with('success', 'Opération effectuée avec succès !'); 
    }

}
