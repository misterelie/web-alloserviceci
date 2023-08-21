<?php

namespace App\Http\Controllers\Backend;

use DateTime;
use App\Models\Devi;
use App\Models\Etat;
use App\Models\Mode;
use App\Helpers\File;
use App\Mail\Demande;
use App\Models\Canal;
use App\Models\Dispo;
use App\Models\Piece;
use App\Models\Ville;
use App\Models\Ethnie;
use App\Helpers\Helper;
use App\Models\Commune;
use App\Models\Diplome;
use App\Models\Domaine;
use App\Models\Service;
use App\Helpers\Helpers;
use App\Models\Alphabet;
use App\Models\Quartier;
use App\Models\Prestation;
use App\Models\Temoignage;
use App\Models\Departement;
use App\Models\Realisation;
use App\Mail\RefuserDemande;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;
use App\Models\ModePrestation;
use App\Models\ModeDepartement;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DemandePrestation;
use App\Models\DevenirPrestataire;
use App\Models\DepartMode;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationPrestataire;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
      }

    public function dashboard(){
        $prestations = Prestation::count();
        $prestataires = DevenirPrestataire::count();
        $demandeprestations = DemandePrestation::count();
        $temoignages = Temoignage::count();
        $communes = Commune::count();
        $modes = Mode::count();
        $ethnies = Ethnie::count();
        $devis = Devi::count();
        $canaux = Canal::count();
        $diplomes = Diplome::count(); 
        $dispos = Dispo::count();
        $pieces =  Piece::count();
        $villes = Ville::count();
        return view('admin.dashboard', compact('prestations', 'demandeprestations', 'prestataires', 'temoignages', 'communes', 'modes', 'villes', 'pieces', 'ethnies', 'canaux', 'devis', 'diplomes', 'dispos'));
    }

    public function listedevis(){
        $modedepartements = ModeDepartement::all();
        // $departements = Departement::all();
        $departements = Departement::orderBy('created_at')->limit(5)->get();
        $villes = Ville::all();
        $prestations = Prestation::all();
        $communes = Commune::all();
        $data['devis'] = Devi::orderBy('id', 'ASC')->get();
        return view('admin.devis.liste-devis', compact('modedepartements', 'villes', 'departements', 'communes'))->with($data);
    }

    // AJOUT VILLES
    public function cities(){
        $data['villes'] = Ville::orderBy('id','ASC')->get();
        $communes = Commune::all();
        return view('admin.villes.cities', compact('communes'))->with($data);
    }

    public function save_ville(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        $villes = new Ville();
        $villes->user_id = Auth::user()->id;
        $villes->libelle = $request->libelle;
        $villes->save();
        return redirect()->back()->with('success', 'Opération effectuée avec succès !');
    }

    public function update_ville(Request $request, Ville $city)
    {
        $request->validate([
            'libelle' => 'required',
        ]);
       
        $city->user_id = Auth::user()->id;
        $city->libelle = $request->libelle;
        $city->save();
        return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
    }

    public function destroy_ville($id){
        $city = Ville::find($id);
        $delete = $city->delete($id);
        if ($delete) {
            return back()->with("success", "Vous avez supprimé avec succès !");
        }
        return abort(500);
    }
    
  
    
    //AJOUT 
    public function add_quartier(){
        $quartiers = Quartier::all();
        return view('admin.quartier',compact('quartiers'));
    }

     //AJOUT COMMUNES
     public function list_commune(){
        $communes = Commune::all();
        $villes = Ville::all();
        return view('admin.communes.add_commune', compact('communes', 'villes'));
    }
    //AJOUT MODES
    public function liste_mode(){
        $departements = Departement::all();
        $modes = Mode::all();
        return view('admin.modes.add-mode', compact('modes', 'departements'));
    }
    //ETHNIES
    public function liste_ethnie(){
        $ethnies = Ethnie::all();
        return view('admin.ethnies.add_ethnie', compact('ethnies'));
    }
      //ALPHABETISATION
    public function add_alphabet(){
        $alphabets = Alphabet::all();
        return view('admin.alphabet.add', compact('alphabets'));
    }
     //CANAL
     public function ajout_canal_rencontre(){
        $canals = Canal::all();
        return view('admin.canal.add_canal', compact('canals'));
    }
    //DISPONIBILITE
    public function add_dispo(){
        $dispos = Dispo::all();
        return view('admin.dispos.ajout', compact('dispos'));
    }
    //NATURE PIECES
    public function nature_piece(){
        $naturepieces = Piece::all();
        return view('admin.pieces.index', compact('naturepieces'));
    }


    //DIPLOMES
    public function liste_diplome(){
        $diplomes = Diplome::all();
        return view('admin.diplomes.add_diplome', compact('diplomes'));
    }


    //NOS PRESTATION
    public function liste_prestation(){
        $departements = Departement::all();
        $modes = Mode::all();
        $prestations = Prestation::all();
        return view('admin.nos-prestations.index', compact('prestations', 'departements', 'modes'));
    }


    // TOUTES NOS DE DEMANDE DE PRESTATIONS
    public function liste_demande_prestation(){
        $modes = Mode::all();
        $etats = Etat::all();
        $prestations = Prestation::all();
        $ethnies = Ethnie::all();
        $demandeprestations = DemandePrestation::orderBy('id','asc')->get();
        return view('admin.prestationdemande.liste_demande', compact('demandeprestations', 'modes', 'prestations', 'ethnies', 'etats'));
    }

    //LA LISTE DES PRESTATAIRES
    public function list_prestataire(){
        $prestations = Prestation::all();
        $canals = Canal::all();
        $pieces = Piece::all();
        $dispos = Dispo::all();
        $modes = Mode::all();
        $alphabets = Alphabet::all();
        $diplomes = Diplome::all();
        $ethnies = Ethnie::all();
        $communes = Commune::all();
        $prestataires = DevenirPrestataire::orderBy('id', 'asc')->get();
        return view('admin.devenir-prestataire.devenir_presta', compact('prestataires', 'modes', 'ethnies', 'communes', 'prestations', 'alphabets', 'diplomes', 'dispos', 'pieces', 'canals'));
    }


   //SAVE PRESTATION
    public function save_prestation(Request $request){
        $request->validate([
            'libelle' => 'required',
            'image_prestation' => 'required',
        ]);

        $prestations = new Prestation();
        $prestations->user_id = Auth::user()->id;

        if ($request->hasFile('image_prestation')) {
            $filename = $request->image_prestation;
            $fileprestation = time() . '.' . $filename->Extension();
            $filename->move(public_path("uploadsprestation"), $fileprestation);
            $prestations->image_prestation = $fileprestation;
        }

        $prestations->libelle = $request->libelle;
        $prestations->save();
        return redirect()->back()->with('success', 'Félicitations!  Vous avez la prestation  ajouté avec succès ');
    }
    
    public function update(Request $request, Prestation $prestation)
    {
            $request->validate([
                    'libelle' => 'required',
                ]);

                if ($request->hasFile('image_prestation')) {
                    $filename = $request->image_prestation;
                    $fileprestation = time() . '.' . $filename->Extension();
                    $filename->move(public_path("uploadsprestation"), $fileprestation);
                    $prestation->image_prestation = $fileprestation;
                }

                $prestation->libelle = $request->libelle;
                $prestation->user_id = Auth::user()->id;
                $prestation->update();
                return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour la prestation avec succès ');
    }


            public function delete(Prestation $prestation)
            {
                $prestation->delete();
                return back()->with("success", "Cette prestation a été supprimé avec succès !");
            }

            // STORE ETHNIE
            public function enregis_ethnie(Request $request){
                $request->validate([
                    'ethnie' => 'required',
            
                ]);
                $ethnies = new Ethnie();
                $ethnies->ethnie = $request->ethnie;
                $ethnies->save();
                return redirect()->back()->with('success', 'Félicitations!  Vous avez ajouté avec succès ');
            }
            public function update_ethnie(Request $request, Ethnie $ethnie){
                $request->validate([
                    'ethnie' => 'required',
                
                    ]);
                    $ethnie->ethnie = $request->ethnie;
                    $ethnie->update();
                    return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                }
                
                public function delete_ethnie(Ethnie $ethnie){
                    $ethnie->delete();
                    return back()->with("success", "Vous avez supprimé avec succès !");
                }

                  //STORE MODES
            public function enregis_mode(Request $request){
                $request->validate([
                    'mode' => 'required',
                ]);

                $modes = new Mode();
                $modes->mode = $request->mode;
                $modes->save();
                return redirect()->back()->with('success', 'Félicitations!  Vous avez ajouté avec succès ');
            }

            public function update_mode(Request $request, Mode $mode){
                $request->validate([
                    'mode' => 'required',
                
                ]);
                    $mode->mode = $request->mode;
                    $mode->update();
                    return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                }

                public function delete_mode($id){
                    $mode = Mode::find($id);
                    $delete = $mode->delete($id);
                    if ($delete) {
                        return back()->with("success", "Vous avez supprimé avec succès !");
                    }
                    return abort(500);
                }


                //MISE A JOUR DEMANDE DE PRESTATIONS
                public function update_demande(Request $request, DemandePrestation $demandeprestation)
                {
                    $request->validate([
                        'nom' => 'required',
                        'prenoms' => 'required',
                        'telephone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',
                        'prestation_id' => 'required',
                        'mode_id' => 'nullable',
                        'salaire_propose' => 'required|numeric|min:0',
                        'ethnie_id' => 'nullable',
                        'age_demande' => 'nullable',
                        'observation' => 'required'
                    ]);
                    
                        if (!is_null($request->nom)) {
                            $demandeprestation->nom = $request->nom;
                        }
                        
                        if (!is_null($request->prenoms)) {
                            $demandeprestation->prenoms = $request->prenoms;
                        }

                        if (!is_null($request->telephone)) {
                            $demandeprestation->telephone = $request->telephone;
                        }
                        if (!is_null($request->prestation_id)) {
                            $demandeprestation->prestation_id = $request->prestation_id;
                        }
                        if (!is_null($request->mode_id)) {
                            $demandeprestation->mode_id = $request->mode_id;
                        }
                        if (!is_null($request->ethnie_id)) {
                            $demandeprestation->ethnie_id = $request->ethnie_id;
                        }

                        if (!is_null($request->salaire_propose)) {
                            $demandeprestation->salaire_propose = intval($request->salaire_propose);
                        }

                        if (!is_null($request->age_demande)) {
                            $demandeprestation->age_demande = $request->age_demande;
                        }

                        
                        if (!is_null($request->observation)) {
                            $demandeprestation->observation = $request->observation;
                        }
                        $demandeprestation->update();
                        return redirect()->back()->with('success', 'Félicitations!  Votre mise  a été effectué avec succès ');
                }

                public function deletedemande($id){
                    $demandeprestation = DemandePrestation::find($id);
                    $delete = $demandeprestation->delete($id);
                    if ($delete) {
                        return back()->with("success", "Vous avez supprimé avec succès !");
                    }
                    return abort(500);
                }
              

                // Envoie email d'acceptation
                //ACCEPTER LA DEMANDE
                public function AccepterDemande(Request $request, DemandePrestation $demandeprestation){

                    $request->validate([
                        'etat' => 'required',
                        'motif_de_rejet' => 'required',
                    ]);

                if ($request->etat) {
                    $demandeprestation->etat = $request->etat;
                    $demandeprestation->motif_de_rejet = $request->motif_de_rejet;
                }
                    if($demandeprestation->update())
                    {
                        //*Envoyer le mail de notification à l'utilisateur
                        if (!is_null($demandeprestation->email)) {
                            Mail::to($demandeprestation->email)->send(new Demande($demandeprestation));
                        }
                        
                        return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès. L'utilisateur recevra un Email de notification sur votre décision");
                    }
                    
                }

                //ACCEPTER PRESTATAIRE
                public function accepterPrestataire(Request $request, DevenirPrestataire $prestataire)
                {
                    //dd($request->all());
                    $request->validate([
                        'etat' => 'required',
                        'motif' => 'required',
                    ]);
                    if($request->etat){
                        $prestataire->etat = $request->etat;
                        $prestataire->motif = $request->motif;
                    }
                    if($prestataire->update())
                    {
                        if (!is_null($prestataire->email)) {
                            Mail::to($prestataire->email)->send(new NotificationPrestataire($prestataire));
                        }
                        return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès. L'utilisateur recevra un Email de notification sur votre décision");
                    }

                }


                //update prestataire
                public function update_prestataire(Request $request, DevenirPrestataire $prestataire ){
                    //dd($request->all());

                    $request->validate([
                        'nom' => 'required',
                        'prenoms' => 'required',
                        'date_naiss' => 'required',
                        'nbre_enfant' => 'nullable',
                        'telephone1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                        'telephone2' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                        'whatsapp' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                        'email' => 'nullable|email:unique',
                        'ethnie_id' => 'required',
                        'commune_id' => 'nullable',
                        'quartier' => 'nullable',
                        'prestation_id' => 'nullable',
                        'annee_experience' => 'nullable',
                        'pretention_salairiale' => 'required|numeric|min:0',
                        'zone' => 'nullable',
                        'contact_urgence' => 'nullable',
                        'reference' => 'nullable',
                        'contact_reference' => 'nullable',
                        'alphabet_id' => 'required',
                        'diplome_id' => 'nullable',
                        'mode_id' => 'required',
                        'dispo_id' => 'nullable',
                        'piece_id' => 'required',
                        'numero_piece' => 'required',
                        'copy_piece' => 'nullable|mimes:png,jpg,jpeg,csv,txt,pdf',
                        'canal_id' => 'nullable',
                        'copy_last_diplome' => 'nullable|mimes:png,jpg,jpeg,csv,txt,pdf', 
                        'avis' => 'nullable',
                    ]);

                    if (!is_null($request->nom)) {
                        $prestataire->nom = $request->nom;
                    }

                    if (!is_null($request->prenoms)) {
                        $prestataire->prenoms = $request->prenoms;
                    }

                    if (!is_null($request->date_naiss)) {
                        $prestataire->date_naiss = $request->date_naiss;
                    }

                    if (!is_null($request->nbre_enfant)) {
                        $prestataire->nbre_enfant = $request->nbre_enfant;
                    }

                    if (!is_null($request->telephone1)) {
                        $prestataire->telephone1 = $request->telephone1;
                    }

                    if (!is_null($request->telephone2)) {
                        $prestataire->telephone2 = $request->telephone2;
                    }

                    if (!is_null($request->whatsapp)) {
                        $prestataire->whatsapp = $request->whatsapp;
                    }

                    if (!is_null($request->email)) {
                        $prestataire->email = $request->email;
                    }

                    if (!is_null($request->ethnie_id)) {
                        $prestataire->ethnie_id = $request->ethnie_id;
                    }

                    if (!is_null($request->commune_id)) {
                        $prestataire->commune_id = $request->commune_id;
                    }

                    if (!is_null($request->quartier)) {
                        $prestataire->quartier = $request->quartier;
                    }

                    if (!is_null($request->prestation_id)) {
                        $prestataire->prestation_id = $request->prestation_id;
                    }

                    if (!is_null($request->annee_experience)) {
                        $prestataire->annee_experience = $request->annee_experience;
                    }

                    if (!is_null($request->pretention_salairiale)) {
                        $prestataire->pretention_salairiale = $request->pretention_salairiale;
                    }

                    if (!is_null($request->zone)) {
                        $prestataire->zone = $request->zone;
                    }

                    if (!is_null($request->contact_urgence)) {
                        $prestataire->contact_urgence = $request->contact_urgence;
                    }

                    if (!is_null($request->reference)) {
                        $prestataire->reference = $request->reference;
                    }

                    if (!is_null($request->contact_reference)) {
                        $prestataire->contact_reference = $request->contact_reference;
                    }

                    if (!is_null($request->alphabet_id)) {
                        $prestataire->alphabet_id = $request->alphabet_id;
                    }

                    if (!is_null($request->diplome_id)) {
                        $prestataire->diplome_id = $request->diplome_id;
                    }

                    if (!is_null($request->mode_id)) {
                        $prestataire->mode_id = $request->mode_id;
                    }

                    if (!is_null($request->dispo_id)) {
                        $prestataire->dispo_id = $request->dispo_id;
                    }

                    if (!is_null($request->piece_id)) {
                        $prestataire->piece_id = $request->piece_id;
                    }

                    if (!is_null($request->numero_piece)) {
                        $prestataire->numero_piece = $request->numero_piece;
                    }
                    if (!is_null($request->copy_piece)) {
                        $prestataire->copy_piece = $request->copy_piece;
                    }

                    if (!is_null($request->canal_id)) {
                        $prestataire->canal_id = $request->canal_id;
                    }

                    if (!is_null($request->avis)) {
                        $prestataire->avis = $request->avis;
                    }
                    

                    if ($request->hasFile('photo')) {
                        $imag = $request->photo;
                        $imageName = time() . '.' . $imag->Extension();
                        $imag->move(public_path("PrestatairePhoto"), $imageName);
                        $prestataire->photo = $imageName;
                    }
                    //TRAITEMENT COPIER DE LA PIECE
            
                    if ($request->hasFile('copy_piece')) {
                        $filename = $request->copy_piece;
                        //dd($filename);
                        $imageName = time() . '.' . $filename->Extension();
                        $filename->move(public_path("FichierCopiepiece"), $imageName);
                        $prestataire->copy_piece = $imageName;
                    }
                    //TRAITEMENT COPIE DU DERNIER DIPLOME
                    if ($request->hasFile('copy_last_diplome')) {
                        $filename = $request->copy_last_diplome;
                        $filepiece = time() . '.' . $filename->Extension();
                        $filename->move(public_path("uploads"), $filepiece);
                        $prestataire->copy_last_diplome = $filepiece;
                    }

                    if ($prestataire->update()) {
                        return redirect()->back()->with("success", "Réussite! Données enregistrées avec succès.");
                    } else {
                        return redirect()->back()->with("error", "Echec ! Une erreur inconnue est survenue");
                    }

                }

                public function delete_prestataire($id){
                    $prestataire = DevenirPrestataire::find($id);
                    $delete = $prestataire->delete($id);
                    if ($delete) {
                        return back()->with("success", "Vous avez supprimé avec succès !");
                    }
                    return abort(500);
                }


                public function enregis_diplome(Request $request){
                    $request->validate([
                        'diplome' => 'required',
                    ]);
                    $diplomes = new Diplome();
                    $diplomes->diplome= $request->diplome;
                    $diplomes->save();
                    return redirect()->back()->with('success', 'Félicitations!  Vous avez ajouté avec succès ');
                }


        public function update_diplome(Request $request, Diplome $diplome){
                    $request->validate([
                        'diplome' => 'required',
                    
                        ]);
                        if(!is_null($request->diplome)){
                            $diplome->diplome = $request->diplome;
                        }
                        $diplome->update();
                        return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                    }

        public function delete_diplome(Diplome $diplome){
                        $diplome->delete();
                        return back()->with("success", "Vous avez supprimé avec succès !");
                    }

                    //ENREGISTREMENT ALPHABET
        public function enregistre_alphabet(Request $request){
                        $request->validate([
                            'alphabet' => 'required',
                        ]);
                        $alphabets = new Alphabet();
                        $alphabets->alphabet = $request->alphabet;
                        $alphabets->save();
                        return back()->with("success", "Vous avez ajouté avec succès !");
                    }


        public function update_alphabet(Request $request, Alphabet $alphabet){
                        $request->validate([
                            'alphabet' => 'required',
                        
                            ]);
                            if(!is_null($request->alphabet)){
                                $alphabet->alphabet = $request->alphabet;
                            }
                            $alphabet->update();
                            return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                        }

            public function delete_alphabet(Alphabet $alphabet)
            {
                 $alphabet->delete();
                 return back()->with("success", "Vous avez supprimé avec succès !");
            }

            public function save_canal_rencontre(Request $request)
            {
                $request->validate
                ([
                    'canal' => 'required',
                ]);
                $canals = new  Canal();
                 $canals->canal = $request->canal;
                $canals->save();
                 return back()->with("success", "Vous avez ajouté avec succès !");
            }

            public function updatecanal(Request $request, Canal $canal)
            {
                   $request->validate
                   ([
                        'canal' => 'required',
                   ]);

                    if(!is_null($request->canal)){
                                    $canal->canal = $request->canal;
                                }
                                $canal->update();
                                return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
            }

                            public function delete_canal($id){
                                $canal = Canal::find($id);
                                $delete = $canal->delete($id);
                                if ($delete) {
                                    return back()->with("success", "Vous avez supprimé avec succès !");
                                }
                                return abort(500);
                            }

                            //STORE DISPONILITES
                            public function save_dispo(Request $request){
                                $request->validate([
                                    'dispo' => 'required',
                                ]);
                                $dispos = new Dispo();
                                $dispos->dispo = $request->dispo;
                                $dispos->save();
                                return back()->with("success", "Vous avez ajouté avec succès !");
                            }

                            public function update_dispo(Request $request, Dispo $dispo){
                                $request->validate([
                                    'dispo' => 'required',
                                    ]);
                                    if (!is_null($request->dispo)) {
                                        $dispo->dispo = $request->dispo;
                                        $dispo->update();
                                      return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                                    }
                                }

                                public function delete_dispo($id){
                                    $dispo = Dispo::find($id);
                                    $delete = $dispo->delete($id);
                                    if ($delete) {
                                        return back()->with("success", "Vous avez supprimé avec succès !");
                                    }
                                    return abort(500);
                                }

                                //SAVE NATURE PIECES
                                public function save_nature_piece(Request $request){
                                    $request->validate([
                                        'piece' => 'required',
                                    ]);
                                    $naturepieces = new Piece();
                                    $naturepieces->piece = $request->piece;
                                    $naturepieces->save();
                                    return back()->with("success", "Vous avez ajouté avec succès !");
                                }
                                //UPDATE
                                public function update_piece(Request $request, Piece $naturepiece){
                                    $request->validate([
                                        'piece' => 'required',
                                        ]);
                                        if (!is_null($request->piece)) {
                                            $naturepiece->piece = $request->piece;
                                        }
                                        $naturepiece->update();
                                        return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                                    }

                                    //SUPPRESSION
                                    public function delete_nature_piece($id){
                                        $naturepiece = Piece::find($id);
                                        $delete = $naturepiece->delete($id);
                                        if ($delete) {
                                            return back()->with("success", "Vous avez supprimé avec succès !");
                                        }
                                        return abort(500);
                                    }

                                    //SAVE COMMUNE
                                    public function save_commune(Request $request)
                                    {
                                        $request->validate([
                                            'commune' => 'required',
                                            'ville_id' => 'required'
                                        ]);
                                        // $communes = Commune::where('commune', $request->commune)->exists();
                                        $communes = new Commune();
                                        $communes->commune = $request->commune;
                                        $communes->ville_id = $request->ville_id;
                                        $communes->save();
                                        return redirect()->back()->with('success', 'Opération effectuée avec succès !');
                                    }

                                    public function update_commune(Request $request, Commune $comm)
                                    {
                                        $request->validate([
                                            'commune' => 'required',
                                            ]);
                                            if (!is_null($request->commune)) {
                                                $comm->commune = $request->commune;
                                            }
                                            $comm->update();
                                            return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                                        }

                                        //SUPPRESSION
                                    public function delete_commune($id)
                                    {
                                        $comm = Commune::find($id);
                                        $delete = $comm->delete($id);
                                        if ($delete) {
                                            return back()->with("success", "Vous avez supprimé avec succès !");
                                        }
                                        return abort(500);
                                    }

                                     //SAVE DOMAINE
                                     public function save_quartier(Request $request)
                                     {
                                         $request->validate([
                                             'quartier' => 'required',
                                         ]);
                                         $quartiers = new Quartier();
                                         $quartiers->quartier = $request->quartier;
                                         $quartiers->save();
                                         return back()->with("success", "Vous avez ajouté avec succès !");
                                     }

                                     public function update_tiek(Request $request, Quartier $quartier)
                                     {
                                         $request->validate([
                                             'quartier' => 'required',
                                             ]);
                                             if (!is_null($request->quartier)) {
                                                 $quartier->quartier = $request->quartier;
                                             }
                                             $quartier->update();
                                             return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
                                         }

                                    public function destroy($id){
                                        $quartier = Quartier::find($id);
                                        $delete = $quartier->delete($id);
                                        if ($delete) {
                                            return back()->with("success", "Vous avez supprimé avec succès !");
                                        }
                                        return abort(500);
                                    }


        // GESTION DEVIS
        public function update_devis(Request $request, $id)
        {
            $request->validate([
                'nom' => 'required',
                'prenoms' => 'required',
                'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'ville_id' => 'required',
                'quartier' => 'required',
                'mode_departement_id' => 'required',
                'commune_id' => 'required',
                'date_execution' => 'required',
                'heure_execution' => 'required',
                'description_devis' => 'required',
                'departement_id' => 'nullable'
            ]);

            $devi = Devi::find($id);
            //dd($devi);
            $devi->nom = $request->nom;
            $devi->prenoms = $request->prenoms;
            $devi->telephone = $request->telephone;
            $devi->date_execution = $request->date_execution;
            $devi->heure_execution = $request->heure_execution;
            $devi->description_devis = $request->description_devis;

            if(!is_null($request->ville_id)){
                $devi->ville_id = $request->ville_id;
            }
            if(!is_null($request->departement_id)){
                $devi->departement_id = $request->departement_id;
            }
            if(!is_null($request->commune_id)){
                $devi->commune_id = $request->commune_id;
            }
            if(!is_null($request->mode_departement_id)){
                $devi->mode_departement_id = $request->mode_departement_id;
            }

            $devi->save();
            return redirect()->back()->with("success"," Réussite !  Opération effectuée avec succès");
        }
      

        public function delete_devis($devi)
        {
                 $devi = Devi::find($devi);
                 $devi->delete();
                 return back()->with("success", "Ce devis a été avec succès !");
        }


        //REALISATION

        public function realisation(){
            $realisations = Realisation::all();
            return view('admin.realisation.create', compact('realisations'));
        }

        public function store(Request $request){

            $date = new DateTime();
            $realisation= Realisation::create([
                'photo'=> $request->photo ,
                'realisation'=> $request->realisation ,
                'user_id' =>  Auth::user()->id,
            ]);

             if ($request->hasFile("photo")){
                $photo_name = $request->photo;
                $piece_name = time() . '.' . $request->nom. $request->prenoms. $date->format('dmYhis'). '.' . $photo_name->getClientOriginalExtension();
                $photo_name->move(public_path('UploadRealisations') , $piece_name);
                $realisation->photo = $piece_name;
              }
              $realisation->save();
              return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        
            // if($realisation)
            // {
            //     return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
            // }else{
            //     return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
            // }
        }

        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realisation  $realisation
     * @return \Illuminate\Http\Response
     */
    public function update_realisation(Request $request, Realisation $real)
    {
        $date = new DateTime();
        $array = [
            'realisation'=> $request->realisation ,
            'user_id' =>  Auth::user()->id,
        ];
        if ($request->hasFile("photo")){
            $photo_name = $request->photo;
            $piece_name = time() . '.' . $request->nom. $request->prenoms. $date->format('dmYhis'). '.' . $photo_name->getClientOriginalExtension();
            $photo_name->move(public_path('UploadRealisations') , $piece_name);
            $real->photo = $piece_name;
          }
        
        if($real->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realisation  $realisation
     * @return \Illuminate\Http\Response
     */
    public function destroy_realisation(Realisation $real)
    {
        $query = $real->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    //FICHE DE DEMANDE
    public function fiche($id)
    {
        $data['demandeprestation'] = DemandePrestation::where('id', $id)->first();
        if(!is_null($data['demandeprestation'])){
            setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
            $pdf = PDF::loadView('admin.prestationdemande.fiche_demande', $data);
            return $pdf->stream();
        }else {
            echo "Vous n'êtes pas concerné !";
          }
        
    }

    //PRESTATIRE FICHE
    public function fiche_prestataire($id)
    {
        $prestataire = DevenirPrestataire::where('id', $id)->first();
        // dd($prestataire);
        if(!is_null($prestataire)){
            setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
            $pdf = PDF::loadView('admin.devenir-prestataire.presta_fiche', compact('prestataire'));
            return $pdf->stream();
        }else {
            echo "Vous n'êtes pas concerné !";
          }
    }



    //AUTRES SERVICES
    public  function services(){
        $services = Service::all();
        return view('admin.autres_services.service', compact('services'));
    }

    public function save_service(Request $request)
    {
        $request->validate([
            'libelle' => 'required'
        ]);
        $services = new Service();
        $services->user_id = Auth::user()->id;
        $services->libelle = $request->libelle;
        $services->save();
        return redirect()->back()->with('success', 'Opération effectuée avec succès !');
    }

    public function update_service(Request $request, Service $service)
    {
        //dd($request->all());
        $request->validate([
            'libelle' => 'required'
        ]);
        $service->user_id = Auth::user()->id;
        $service->libelle = $request->libelle;
        $service->save();
        return redirect()->back()->with('success', 'Opération effectuée avec succès !');
    }

    public function delete_service($id){
        $service = Service::find($id);
        $delete = $service->delete($id);
        if ($delete) {
            return back()->with("success", "Vous avez supprimé avec succès !");
        }
        return abort(500);
    }

    //ARCHIVAGES DEMANDES
     public function archive_demande(){
        return view('admin.prestationdemande.archives');
     }


     //MODE DEPARTEMENT
     public function mode_departement(){
        $modedepartements = ModeDepartement::all();
        $departements = Departement::all();
        return view('admin.mode-depart', compact('modedepartements', 'departements'));
     }

     public function save_mode_departement(Request $request){
        $request->validate([
            'libelle' => 'required',
            
        ]);

        $modedepartements = new ModeDepartement();
        $modedepartements->user_id = Auth::user()->id;
        $modedepartements->libelle = $request->libelle;
        $modedepartements->save();
        return redirect()->back()->with('success', 'Félicitations!  Vous avez ajouté avec succès ');
    }

    public function update_mode_departement(Request $request, ModeDepartement $modedepartement){
        $request->validate([
            'libelle' => 'required',
        
        ]);
            $modedepartement->libelle = $request->libelle;
            $modedepartement->update();
            return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour avec succès ');
        }

        public function delete_mode_depart($id){
            $modedepartement = ModeDepartement::find($id);
            $delete = $modedepartement->delete($id);
            if ($delete) {
                return back()->with("success", "Vous avez supprimé avec succès !");
            }
            return abort(500);
        }


        public function depart_mode(){
            $departmodes = DepartMode::all();
            $departements = Departement::all();
            $modedepartements = ModeDepartement::all();
            return view('admin.depart-mode', compact('departements', 'modedepartements', 'departmodes'));
        }

        public function save_depart_mode(Request $request)
        {
            $request->validate([
                'titre' => 'required',
                'departement_id' => 'required',
                'mode_departement_id' => 'required',
                'description' => 'required',
            ]);
            $departmodes = new DepartMode();
            $departmodes->user_id = Auth::user()->id;
            $departmodes->titre = $request->titre;
            $departmodes->description = $request->description;
            $departmodes->mode_departement_id = $request->mode_departement_id;
            $departmodes->departement_id = $request->departement_id;
            $departmodes->save();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }

}

