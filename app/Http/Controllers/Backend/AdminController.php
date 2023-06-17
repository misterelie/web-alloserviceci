<?php

namespace App\Http\Controllers\Backend;

use App\Models\Etat;
use App\Models\Mode;
use App\Helpers\File;
use App\Mail\Demande;
use App\Models\Canal;
use App\Models\Dispo;
use App\Models\Piece;
use App\Models\Ethnie;
use App\Helpers\Helper;
use App\Models\Commune;
use App\Models\Diplome;
use App\Models\Domaine;
use App\Models\Alphabet;
use App\Models\Quartier;
use App\Models\Prestation;
use App\Models\Temoignage;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;
use App\Models\DemandePrestation;
use App\Models\DevenirPrestataire;
use App\Http\Controllers\Controller;
use App\Mail\RefuserDemande;
use Illuminate\Support\Facades\Mail;

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
        return view('admin.dashboard', compact('prestations', 'demandeprestations', 'prestataires', 'temoignages'));
    }

    //AJOUT 
    public function add_quartier(){
        $quartiers = Quartier::all();
        return view('admin.quartier',compact('quartiers'));
    }

     //AJOUT COMMUNES
     public function list_commune(){
        $communes = Commune::all();
        return view('admin.communes.add_commune', compact('communes'));
    }
    //AJOUT MODES
    public function liste_mode(){
        $modes = Mode::all();
        return view('admin.modes.add-mode', compact('modes'));
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
        $prestations = Prestation::all();
        return view('admin.nos-prestations.index', compact('prestations'));
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
        $prestations->libelle = $request->libelle;

        if ($request->hasFile('image_prestation')) {
            $filename = $request->image_prestation;
            $fileprestation = time() . '.' . $filename->Extension();
            $filename->move(public_path("uploadsprestation"), $fileprestation);
            $prestations->image_prestation = $fileprestation;
        }
        $prestations->save();
        return redirect()->back()->with('success', 'Félicitations!  Vous avez la prestation  ajouté avec succès ');
    }
    
    public function update(Request $request, Prestation $prestation){
            $request->validate([
                'libelle' => 'required',
                'image_prestation' => 'nullable',
            
                ]);
                $prestation->libelle = $request->libelle;
                if ($request->hasFile('image_prestation')) {
                    $filename = $request->image_prestation;
                    $fileprestation = time() . '.' . $filename->Extension();
                    $filename->move(public_path("uploadsprestation"), $fileprestation);
                    $prestation->image_prestation = $fileprestation;
                }
                $prestation->update();
                return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour la prestation avec succès ');
            }

            public function delete(Prestation $prestation){
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
                    //dd($request->all());
                    $request->validate([
                        'nom' => 'required',
                        'prenoms' => 'required',
                        'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',
                        'prestation_id' => 'nullable',
                        'mode_id' => 'nullable',
                        'salaire_propose' => 'required|numeric|min:0',
                        'ethnie_id' => 'nullable',
                        'age_demande' => 'required'
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



                    // if (!is_null($request->etat == 'accepter')) {
                    //     $demandeprestation->etat = $request->etat;
                    // }




                    // if (!is_null($demandeprestation->email)) {
                    //     Mail::to($demandeprestation->email)->send(new Demande($demandeprestation, $action));
                    //     return redirect()->back()->with('success', 'Félicitations!  Vous accepté avec succès');
                    // }else {
                    //     return redirect()->back()->with('error', 'une erreur est surnevue');
                    // }

                   

                    //TRAITER LE STATUT ACCEPTER DE LA DEMANDE
                    // $etat = Etat::where('status', 'Accepter')->first();
                    // $demandeprestation->etat = $etat->status;
                    // if (!is_null($request->motif_de_rejet)) {
                    //     $demandeprestation->motif_de_rejet = $request->motif_de_rejet;
                    // }
                    
                   
                    
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


                    // $array = [
                    //     "nom"            => $request->nom,
                    //     "prenoms"        => $request->prenoms,
                    //     "nbre_enfant"    => $request->nbre_enfant,
                    //     "date_naiss"     => $request->date_naiss,
                    //     "telephone1"     => $request->telephone1,
                    //     "telephone2"     => $request->telephone2,
                    //     "whatsapp"       => $request->whatsapp,
                    //     "email"          => $request->email,
                    //     "ethnie_id"      => $request->ethnie_id,
                    //     "commune_id"     => $request->commune_id,
                    //     "prestation_id"     => $request->prestation_id,
                    //     "quartier"       => $request->quartier,
                    //     "diplome_id"     => $request->diplome_id,
                    //     "annee_experience"   => $request->annee_experience,
                    //     "pretention_salairiale"   => $request->pretention_salairiale,
                    //     "zone"          => $request->zone,
                    //     "contact_urgence"  => $request->contact_urgence,
                    //     "reference"             => $request->reference,
                    //     "contact_reference"     => $request->contact_reference,
                    //     "alphabet_id"           => $request->alphabet_id,
                    //     "mode_id"               => $request->mode_id,
                    //     "dispo_id"              => $request->dispo_id,
                    //     "piece_id"              => $request->piece_id,
                    //     "numero_piece"          => $request->numero_piece,
                    //     "canal_id"              => $request->canal_id,
                    //     "avis"            => $request->observation,
                    // ];


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

                   

                    // if (!is_null($request->photo)) {
                    //     $photo = File::compress("photo", "uploads/Prestataires/", $request->nom . "_" . $request->prenom, 220, 255);
                    //     $array = array_merge($array, ["photo" => $photo]);
                    // }
            
                    // $copy_piece = NULL;
                    // if (!is_null($request->copy_piece)) {
                    //     $copy_piece = File::upload("copy_piece", "uploads/Prestataires/", "piece_identite_" . $request->nom . "_" . $request->prenom);
                    //     $array = array_merge($array, ["copy_piece" => $copy_piece]);
                    // }
            
                    // $copy_last_diplome = NULL;
                    // if (!is_null($request->copy_last_diplome)) {
                    //     $copy_last_diplome = File::upload("copy_last_diplome", "uploads/Prestataires/", "dernier_diplome_" . $request->nom . "_" . $request->prenom);
                    //     $array = array_merge($array, ["copy_last_diplome" => $copy_last_diplome]);
                    // }

                    // $prestataire->update();
                    // return redirect()->back()->with("success", "Réussite! Données mises à jour avec succès.");
            
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

                        public function delete_alphabet(Alphabet $alphabet){
                            $alphabet->delete();
                            return back()->with("success", "Vous avez supprimé avec succès !");
                        }

                        public function save_canal_rencontre(Request $request){
                            $request->validate([
                                'canal' => 'required',
                            ]);
                            $canals = new  Canal();
                            $canals->canal = $request->canal;
                            $canals->save();
                            return back()->with("success", "Vous avez ajouté avec succès !");
                        }

                        public function updatecanal(Request $request, Canal $canal){
                            $request->validate([
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
                                        ]);
                                        // $communes = Commune::where('commune', $request->commune)->exists();
                                        $communes = new Commune();
                                        $communes->commune = $request->commune;
                                        $communes->save();
                                        return back()->with("success", "Vous avez ajouté avec succès !");
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



}
