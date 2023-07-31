<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
      }
      
    public function index(){
        $departements = Departement::all();
        return view('admin.departement.index', compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ],
        [
            'libelle' => 'Le nom du département est obligatoire',
        ]);
        $departements = new Departement();
        $departements->libelle = $request->libelle;
        $departements->user_id = Auth::user()->id;
        $departements->save();
        return redirect()->back()->with('success', 'Vous avez enregistré avec succès ');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
        ]);
        
        $departement = Departement::find($id);
        $departement->libelle = $request->libelle;
        $departement->user_id = Auth::user()->id;
        $departement->save();
        return redirect()->back()->with('success', 'Vous avez mis à jour avec succès');
    }

    public function delete($id){
        $departement = Departement::find($id);
        //dd($departement);
        $delete = $departement->delete($id);
        if ($delete) {
            return back()->with("success", "Vous avez supprimé avec succès !");
        }
        return abort(500);
    }
    
}
