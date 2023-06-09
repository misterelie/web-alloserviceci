<?php

namespace App\Http\Controllers\Interfaces;

use Exception;
use App\Models\Mode;
use App\Models\About;
use App\Models\Canal;
use App\Models\Dispo;
use App\Models\Piece;
use App\Models\Ethnie;
use App\Models\Commune;
use App\Models\Contact;
use App\Models\Diplome;
use App\Models\Domaine;
use App\Models\Alphabet;
use App\Models\Quartier;
use App\Models\Prestation;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Models\DemandePrestation;
use App\Models\DevenirPrestataire;
use App\Http\Controllers\Controller;
use App\Models\Assistance;
use App\Models\Temoignage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FrontController extends Controller
{
    public function index(){
        $abouts = About::all();
        $demandeprestations = DemandePrestation::count();
        $prestataires = Prestation::count();
        // $domaine = Domaine::all();
        $domaines = Domaine::orderBy('id','asc')->get();
        // $prestations = Prestation::latest()->limit(3)->get();
        return view('front.index', compact('abouts', 'prestations','demandeprestations', 'prestataires', 'domaines'));
    }

    public function vu_about(){
        $abouts = About::all();
        $assistances = Assistance::all();
        return view('frontweb.about', compact('abouts', 'assistances'));
    }

    /* DEMANDE DE PRESTATION */

    public function demande_prestation(){
        $prestations = Prestation::orderBy('id','asc')->get();
        $assistances = Assistance::all();
        $ethnies = Ethnie::all();
        $modes = Mode::all();
        return view('frontweb.demande', compact('prestations', 'ethnies', 'modes', 'assistances'));
    }

    public function demande_prest($id){
        $recup_pres = Prestation::find($id);
        $assistances = Assistance::all();
        $prestations = Prestation::orderBy('id','asc')->get();
        $ethnies = Ethnie::all();
        $modes = Mode::all();
        return view('frontweb.new_file_demande', compact('prestations', 'ethnies', 'modes','recup_pres', 'assistances'));
    }

    public function send_contact(){
        $assistances = Assistance::all();
        return view('frontweb.contact', compact('assistances'));
    }

    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'telephone' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'nullable|email:unique',
            'prestation_id' => 'required',
            'mode_id' => 'required',
            'salaire_propose' => 'required|numeric|min:0',
            'age_demande' => 'nullable',
            'ethnie_id' => 'nullable',
            'date_demande' => 'nullable',
            'heure_demande'  => 'nullable',
            'observation' => 'nullable'
        ],

        [
            'nom.required' => 'Le nom est obligatoire',
            'prenoms.required' => 'Le prénoms est obligatoire',
            'salaire_propose.required' => 'Le salaire est obligatoire',
            'telephone.required' => 'Le téléphone est obligatoire',
            'prestation_id.required' => 'La prestatoin est obligatoire',
            'mode_id.required' => 'Le mode de travail est obligatoire'
        ]);

        $askprestations = new DemandePrestation();
        $askprestations->nom = $request->nom;
        $askprestations->prenoms = $request->prenoms;
        $askprestations->email = $request->email;
        $askprestations->telephone = $request->telephone;

        if (!is_null($request->prestation_id)) {
            $askprestations->prestation_id = $request->prestation_id;
        }

        if (!is_null($request->mode_id)) {
            $askprestations->mode_id = $request->mode_id;
        }

        if (!is_null($request->ethnie_id)) {
            $askprestations->ethnie_id = $request->ethnie_id;
        }
      
        $askprestations->salaire_propose = intval($request->salaire_propose);
        $askprestations->age_demande = $request->age_demande;
        $askprestations->date_demande = $request->date_demande;
        $askprestations->heure_demande = $request->heure_demande;
        $askprestations->observation = $request->observation;
        $askprestations->save();
        return redirect()->back()->with('success', 'Félicitations!  Votre demande a été envoyé avec succès ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_prestataire(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'civilite' => 'required',
            'date_naiss' => 'required',
            'situation_matri' => 'required',
            'nbre_enfant' => 'nullable',
            'telephone1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'telephone2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'whatsapp' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'nullable|email:unique',
            'ethnie_id' => 'required',
            'commune_id' => 'required',
            'quartier' => 'nullable',
            'photo' => 'required',
            'prestation_id' => 'required',
            'annee_experience' => 'nullable',
            'pretention_salairiale' => 'required|numeric|min:0',
            'zone' => 'nullable',
            'contact_urgence' => 'nullable',
            'reference' => 'nullable',
            'contact_reference' => 'nullable',
            'alphabet_id' => 'required',
            'diplome_id' => 'required',
            'mode_id' => 'required',
            'dispo_id' => 'required',
            'piece_id' => 'required',
            'numero_piece' => 'required',
            'copy_piece' => 'nullable|mimes:png,jpg,jpeg,csv,txt,pdf',
            'canal_id' => 'nullable',
            'copy_last_diplome' => 'nullable|mimes:png,jpg,jpeg,csv,txt,pdf', 
            'catalogue_realisa' => 'nullable',
            'avis' => 'nullable',
        ],

        [
            'nom.required' => 'Le nom est obligation',
            'prenoms.required' => 'Le prénom est obligatoire',
            'civilite.required' => 'Votre civilité est obligatoire',
            'date_naiss.required' => 'La date de naissance est obligatoire',
            'situation_matri'=> 'La situation matrimoniale est obligatoire',
            'telephone1.required' => 'Le téléphone est obligation',
            'prestation_id.required' => 'La prestatoin est obligatoire',
            'mode_id.required' => 'Le mode de travail est obligatoire',
            'piece_id.required' => 'la pièce est obligation',
            'numero_piece.required' => 'Le numéro de la pièce est obligation',
            'pretention_salairiale' => 'le salaire est obligatoire',
            'diplome_id'  => 'le diplome est obligatoire',
            'dispo_id' => 'la disponilité est obligatoire',
            'alphabet_id' => 'Veuillez choisir',
            'personne_contact' => 'Le nom de la personne à contacter est obligation',
            'commune_id' => 'La commune est obligatoire',
            'ethnie_id' => 'Ce champ est obligatoire',
            'photo' => 'la photo est obligatoire',
            'annee_experience' => 'Expérience est obligatoire',
            'prestation_id' => 'le domaine est obligatoire',

        ]);

        $devenirprestataires = new DevenirPrestataire();
        $devenirprestataires->nom = $request->nom;
        $devenirprestataires->prenoms = $request->prenoms;
        $devenirprestataires->civilite = $request->civilite;
        $devenirprestataires->date_naiss = $request->date_naiss;
        $devenirprestataires->situation_matri = $request->situation_matri;
        $devenirprestataires->nbre_enfant = $request->nbre_enfant;
        $devenirprestataires->telephone1 = $request->telephone1;
        $devenirprestataires->telephone2 = $request->telephone2;
        $devenirprestataires->whatsapp = $request->whatsapp;
        $devenirprestataires->email = $request->email;
      
         //tratietement d'image
        if ($request->hasFile('photo')) {
            $imag = $request->photo;
            $imageName = time() . '.' . $imag->Extension();
            $imag->move(public_path("PrestatairePhoto"), $imageName);
            $devenirprestataires->photo = $imageName;
        }
        //TRAITEMENT COPIER DE LA PIECE

        if ($request->hasFile('copy_piece')) {
            $filename = $request->copy_piece;
            //dd($filename);
            $imageName = time() . '.' . $filename->Extension();
            $filename->move(public_path("FichierCopiepiece"), $imageName);
            $devenirprestataires->copy_piece = $imageName;
        }
        //TRAITEMENT COPIE DU DERNIER DIPLOME
        if ($request->hasFile('copy_last_diplome')) {
            $filename = $request->copy_last_diplome;
            $filepiece = time() . '.' . $filename->Extension();
            $filename->move(public_path("uploads"), $filepiece);
            $devenirprestataires->copy_last_diplome = $filepiece;
        }

        if (!is_null($request->commune_id)) {
            $devenirprestataires->commune_id = $request->commune_id;
        }

        if (!is_null($request->ethnie_id)) {
            $devenirprestataires->ethnie_id = $request->ethnie_id;
        }

        if (!is_null($request->prestation_id)) {
            $devenirprestataires->prestation_id = $request->prestation_id;
        }

        if (!is_null($request->alphabet_id)) {
            $devenirprestataires->alphabet_id = $request->alphabet_id;
        }

        if (!is_null($request->diplome_id)) {
            $devenirprestataires->diplome_id = $request->diplome_id;
        }

        if (!is_null($request->mode_id)) {
            $devenirprestataires->mode_id = $request->mode_id;
        }

        if (!is_null($request->dispo_id)) {
            $devenirprestataires->dispo_id = $request->dispo_id;
        }

        if (!is_null($request->piece_id)) {
            $devenirprestataires->piece_id = $request->piece_id;
        }

        if (!is_null($request->canal_id)) {
            $devenirprestataires->canal_id = $request->canal_id;
        }

        $devenirprestataires->annee_experience = $request->annee_experience;
        $devenirprestataires->pretention_salairiale = $request->pretention_salairiale;
        // $devenirprestataires->zone_intervention = $request->zone_intervention;
        $devenirprestataires->contact_urgence = $request->contact_urgence;
        $devenirprestataires->reference = $request->reference;
        $devenirprestataires->contact_reference = $request->contact_reference;
        $devenirprestataires->numero_piece = $request->numero_piece;
        $devenirprestataires->quartier = $request->quartier;
        $devenirprestataires->catalogue_realisa = $request->catalogue_realisa;
        $devenirprestataires->avis = $request->avis;
        $devenirprestataires->save();
        return redirect()->back()->with('success', 'Félicitations!  Votre demande a été envoyé avec succès ');
    }

    //SOTRE CONTACT
    public function store_contact(Request $request){
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'email' => 'required',
            'objet' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->nom = $request->nom;
        $contact->prenoms = $request->prenoms;
        $contact->email = $request->email;
        $contact->objet = $request->objet;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès, vous serez contacter plutard!');
        
    }

     //devenir un prestataire
     public function prestataire(){
        $assistances = Assistance::all();
        $prestations = Prestation::all();
        $ethnies = Ethnie::all();
        $communes = Commune::all();
        $quartiers = Quartier::all();
        $domaines = Domaine::all();
        $alphabets = Alphabet::all();
        $canals = Canal::all();
        $modes = Mode::all();
        $dispos = Dispo::all();
        $pieces = Piece::all();
        $diplomes = Diplome::all();
        return view('frontweb.devenir_prestataire', 
              compact('ethnies', 'pieces','communes', 'assistances', 'quartiers', 'prestations', 'domaines', 'alphabets', 'diplomes', 'dispos', 'modes', 'canals'));
    }

    public function demande_presta($id){
        $prestations = Prestation::orderBy('id','asc')->get();
        $recup_pres = Domaine::find($id);
        $assistances = Assistance::all();
        $ethnies = Ethnie::all();
        $communes = Commune::all();
        $quartiers = Quartier::all();
        $domaines = Domaine::all();
        $alphabets = Alphabet::all();
        $canals = Canal::all();
        $modes = Mode::all();
        $dispos = Dispo::all();
        $pieces = Piece::all();
        $diplomes = Diplome::all();
        return view('frontweb.file-prestataire', 
              compact('ethnies', 'pieces','communes', 'quartiers', 'prestations', 'alphabets', 'diplomes', 'dispos', 'modes', 'canals', 'recup_pres', 'assistances'));
    }

    //all prestations
    public function all_prestations(){
        $prestations = Prestation::orderBy('created_at')->get();
        $assistances = Assistance::all();
        return view('frontweb.all_prestation', compact('prestations', 'assistances'));
    }

    public function help(){
        $assistances = Assistance::all();
        return view('front.assistance', compact('assistances'));
    }

    
    //temoignage
    public function testimonial(){
        $temoignages = Temoignage::all();
        return view('front.temoignage', compact('temoignages'));
    }
    public function detail_temoignage($id){
        $temoignage = Temoignage::find($id);
        return view('front.detail_temoignage', compact('temoignage'));
    }

    public function temoignage_form(){
        return view('front.form-temoignage');
    }

    public function store_temoignage(Request $request){
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'texte' => 'required',
            'photo_person' => 'nullable',
        ],

        [
            'nom.required' => 'Le nom est obligation',
            'texte.required' => 'Le texte est obligatoire',
        ]);

        $temoignages = new Temoignage();
        $temoignages->nom = $request->nom;
        $temoignages->texte = $request->texte;

        if (!is_null($request->contact)) {
            $temoignages->contact = $request->contact;
        }

        if ($request->hasFile('photo_person')) {
            $imag = $request->photo_person;
            $imageName = time() . '.' . $imag->Extension();
            $imag->move(public_path("TemoignagnesPhoto"), $imageName);
            $temoignages->photo_person = $imageName;
        }
        $temoignages->save();
        return redirect()->back()->with('success', 'Merci pour votre témoignage!');
        
    }


}
