<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Models\Temoignage;
use Illuminate\Http\Request;

class TemoignageController extends Controller
{
    //

    public function etat(){
        $etats = Etat::all();
        return view('admin.statut', compact('etats'));
    }

    public function store_statut(Request $request){
        //dd($request->all());
        $request->validate([
            'status' => 'required',
        ]);
        $etats = new Etat();
        $etats->status = $request->status;
        $etats->save();
        return redirect()->back()->with('success', 'Vous avez ajouté avec succès!');
        
    }

    public function show_temoignage(){
        $etats = Etat::all();
        $temoignages = Temoignage::all();
        return view('admin.liste_temoignage', compact('temoignages', 'etats'));
    }

    public function save_temoignage(Request $request){
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'texte' => 'required',
            'photo_person' => 'nullable',
        ]);

        
        $temoignages = new Temoignage();
        $temoignages->nom = $request->nom;
        $temoignages->texte = $request->texte;
        $temoignages->contact = $request->contact;

        if ($request->hasFile('photo_person')) {
            $imag = $request->photo_person;
            $imageName = time() . '.' . $imag->Extension();
            $imag->move(public_path("TemoignagnesPhoto"), $imageName);
            $temoignages->photo_person = $imageName;
        }
        $temoignages->save();
        return redirect()->back()->with('success', 'Merci pour votre témoignage!'); 
    }

    public function update_temoignage(Request $request, Temoignage $temoignage){
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'texte' => 'required',
            'photo_person' => 'nullable',
            'etat' => 'nullable'
        ]);
    
        if(!is_null($request->nom)){
            $temoignage->nom = $request->nom;
        }

        if (!is_null($request->texte)) {
            $temoignage->texte = $request->texte;
        }

        if (!is_null($request->contact)) {
            $temoignage->contact = $request->contact;
        }

        if (!is_null($request->etat)) {
            $temoignage->etat = $request->etat;
        }

        if ($request->hasFile('photo_person')) {
            $imag = $request->photo_person;
            $imageName = time() . '.' . $imag->Extension();
            $imag->move(public_path("TemoignagnesPhoto"), $imageName);
            $temoignage->photo_person = $imageName;
        }
        $temoignage->update();
        return redirect()->back()->with('success', 'Bravo vous avez mis à jour avec succès!'); 
    }

    public function destroy_temoignage($id){
        $temoignage = Temoignage::find($id);
        $delete = $temoignage->delete($id);
        if ($delete) {
            return back()->with("success", "Vous avez supprimé avec succès !");
        }
        return abort(500);
    }

}
