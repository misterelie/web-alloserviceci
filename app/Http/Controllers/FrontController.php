<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DevenirPrestataire;
use App\Models\DemandeDePrestation;
use App\Http\Controllers\Controller;
use App\Models\Contact;


class Frontcontroller extends Controller
{
    public function index()
    {
    return view('demandedeprestation');
    }


    public function save_prestation(Request $request){
        //dd($request->all());
        $request->validate([
            'prestation_demande' => "required",
           'mode_travail' => "required",
            'salaire_propose' =>  "required",
            'age_prestataire' => "required",
            'ethnie' => "required",
            'date_execution_demande' =>  "required",
            'date_appel' => "required",
            'observation' => "required",
             ]);

            $prestations = new DemandeDePrestation();
            $prestations->prestation_demande = $request->prestation_demande;
            $prestations->mode_travail = $request->mode_travail;
            $prestations->salaire_propose = $request->salaire_propose;
            $prestations->age_prestataire = $request->age_prestataire;
            $prestations->ethnie = $request->ethnie;
            $prestations->date_execution_demande = $request->date_execution_demande;
            $prestations->date_appel = $request->date_appel;
            $prestations->observation = $request->observation;
            $prestations->save();
        return redirect()->back()->with('success', 'Votre demande à été reçue avec succès .');
    }

    public function save_devenir(Request $request){
    $request->validate([
            'nom' => "required",
            'prenom' => "required",
            'civilite' => "required",
            'date_naissance' => "required",
            'situation_matri' => "required",
            'nombre_enfant' => "required",
            'contact1' =>  "required",
            'contact2' => "required",
            'whatsapp' => "required",
            'adresse' =>  ['required', 'string', 'email', 'max:255'],
            'ethnie' => "required",
            'commune' => "required",
            'quartier' => "required",
            'photo' => "required",
            'activite' => "required",
            'anne_experience' => "required",
            'pretention_salariale' => "required",
            'zone_intervention' => "required",
            'personne_contacter' => "required",
            'reference' => "required",
            'reference_contact' => "required",
            'alphabetisation' => "required",
            'dernier_diplome' => "required",
            'mode_travail' => "required",
            'disponibilite' => "required",
            'nature_piece' => "required",
            'numero_piece' => "required",
            'rencontre_allo_service' => "required",
            'date_appel' => "required",
            'copie_piece' => "required",
            'copie_diplome' => "required",
            'catalogue' => "required",
            'observation' => "required",

             ]);


            $devenirs = new DevenirPrestataire();
            $devenirs->nom = $request->nom;
            $devenirs->prenom = $request->prenom;
            $devenirs->civilite = $request->civilite;
            $devenirs->date_naissance = $request->date_naissance;
            $devenirs->situation_matri = $request->situation_matri;
            $devenirs->nombre_enfant = $request->nombre_enfant;
            $devenirs->contact1 = $request->contact1;
            $devenirs->contact2 = $request->contact2;
            $devenirs->whatsapp = $request->whatsapp;
            $devenirs->adresse = $request->adresse;
            $devenirs->ethnie = $request->ethnie;
            $devenirs->commune = $request->commune;
            $devenirs->quartier = $request->quartier;

            if ($request->hasFile('photo'))
            {
               $imag = $request->photo;
               $imageName = time() . '.' . $imag->Extension();
               $imag->move(public_path("photos"), $imageName);
               $devenirs->photo = $imageName;
            }
            $devenirs->activite = $request->activite;
            $devenirs->anne_experience = $request->anne_experience;
            $devenirs->pretention_salariale = $request->pretention_salariale;
            $devenirs->zone_intervention = $request->zone_intervention;
            $devenirs->personne_contacter = $request->personne_contacter;
            $devenirs->reference	 = $request->reference	;
            $devenirs->reference_contact = $request->reference_contact;
            $devenirs->alphabetisation = $request->alphabetisation;
            $devenirs->dernier_diplome = $request->dernier_diplome;
            $devenirs->mode_travail = $request->mode_travail;
            $devenirs->disponibilite = $request->disponibilite;
            $devenirs->nature_piece = $request->nature_piece;
            $devenirs->numero_piece = $request->numero_piece;
            $devenirs->rencontre_allo_service = $request->rencontre_allo_service;
            $devenirs->date_appel = $request->date_appel;


            if ($request->hasFile('copie_piece'))
            {
               $copiepiece = $request->copie_piece;
               $pieceName = time() . '.' . $copiepiece->Extension();
               $copiepiece->move(public_path("pieces"), $pieceName);
               $devenirs->copie_piece = $pieceName;
            }

             if ($request->hasFile('copie_diplome'))
            {
               $copiedilome = $request->copie_diplome;
               $diplomeName = time() . '.' . $copiedilome->Extension();
               $copiedilome->move(public_path("diplomes"), $diplomeName);
               $devenirs->copie_diplome = $diplomeName;
            }

              if ($request->hasFile('catalogue'))
            {
               $copiecatalogue = $request->catalogue;
               $catalogueName = time() . '.' . $copiecatalogue->Extension();
               $copiecatalogue->move(public_path("catalogues"), $catalogueName);
               $devenirs->catalogue = $catalogueName;
            }

            $devenirs->observation = $request->observation;

        $devenirs->save();
        return redirect()->back()->with('success', 'Demande reçue avec succès .');
    }
    public function save_contact(Request $request){
        //dd($request->all());
        $request->validate([
         'nom' => "required",
        'adresse_mail' => ['required', 'string', 'email', 'max:255'],
         'message' =>  "required",
          ]);

         $contact = new Contact();
         $contact->nom = $request->nom;
         $contact->adresse_mail = $request->adresse_mail;
         $contact->message = $request->message;
         $contact->save();
     return redirect()->back()->with('success', 'Votre demande à été reçue avec succès .');

    }
}