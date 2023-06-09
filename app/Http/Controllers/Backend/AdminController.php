<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mode;
use App\Models\Canal;
use App\Models\Dispo;
use App\Models\Piece;
use App\Models\Ethnie;
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

class AdminController extends Controller
{
    //

    public function dasboard(){
        // $services = Service::count();
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
        $prestations = Prestation::orderBy('id','asc')->get();
        return view('admin.nos-prestations.index', compact('prestations'));
    }
    // TOUTES NOS DE DEMANDE DE PRESTATIONS
    public function liste_demande_prestation(){
        $modes = Mode::all();
        $prestations = Prestation::all();
        $ethnies = Ethnie::all();
        $demandeprestations = DemandePrestation::orderBy('id','asc')->get();
        return view('admin.prestationdemande.liste_demande', compact('demandeprestations', 'modes', 'prestations', 'ethnies'));
    }
    //LA LISTE DES PRESTATAIRES
    public function list_prestataire(){
        $prestataires = DevenirPrestataire::orderBy('id', 'asc')->get();
        return view('admin.devenir-prestataire.devenir_presta', compact('prestataires'));
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
            $filename->move(public_path("ImagesPrestaion"), $fileprestation);
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
                    $filename->move(public_path("ImagesPrestaion"), $fileprestation);
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
