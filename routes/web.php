<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MenageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JardinageController;
use App\Http\Controllers\RepassageController;

use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminController as BackendAdminController;
use App\Http\Controllers\Interfaces\FrontController  as InterfacesFrontController ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

 Route::get('/administration', [BackendAdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('administration');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// FRONT
// Route::get('/', [HomeController::class, 'index'])->name("Home.app");

Route::get('/', [InterfacesFrontController::class, 'newindex'])->name("newfront.index");

Route::get('/presentation', [InterfacesFrontController::class, 'vu_about'])->name("front.presentaion");
route::get('/nos-prestations', [InterfacesFrontController::class, 'all_prestations'])->name("front.nos-prestations");
Route::get('/ask.prestation', [InterfacesFrontController::class, 'demande_prestation'])->name("ask.prestation");
Route::post('/save.demandeprestation', [InterfacesFrontController::class, 'store'])->name("save.demandeprestation");
Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");

Route::get('/contactez/nous', [InterfacesFrontController::class, 'send_contact'])->name("front.contact");
Route::post('/save_contact', [InterfacesFrontController::class, 'store_contact'])->name("save_contact");
Route::get('/ask.prestataire', [InterfacesFrontController::class, 'prestataire'])->name("ask.prestataire");
Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");

Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");

Route::get('/demande-prest/{id}', [InterfacesFrontController::class, 'demande_prest'])->name("front.prest");
Route::get('/devenir-presta/{id}', [InterfacesFrontController::class, 'demande_presta'])->name("front.presta");

//temoignages
Route::get('/temoignages/clients', [InterfacesFrontController::class, 'temoignages'])->name("temoignages.clients");

//Nos realisations
Route::get('/nos/realisations', [InterfacesFrontController::class, 'realisations'])->name("newfront.realisation");

Route::get('/nos-services/{slug}/{id}', [InterfacesFrontController::class, 'departement_details'])->name("repassage");

//FRONT DEVIS*

Route::get('/select_mode_devis/{slug}/{id}', [InterfacesFrontController::class, 'select_mode_devis'])->name("select_mode_devis");

Route::get('/demander-un-devis', [DevisController::class, 'devis'])->name("newfront.devis");
Route::post('/store/devis', [DevisController::class, 'store'])->name("store.devis");
Route::get('/getSpecificates', [DevisController::class, 'getSpecificates']);
Route::get('/getCommunes', [DevisController::class, 'getCommunes']);

//ADMINISTRATION
//nos prestations

//ENVOIE EMAIL D'ACCEPTATION
Route::put('/accepterDemandeur/{demandeprestation}', [BackendAdminController::class, 'AccepterDemande']);
Route::put('/accepterPrestataire/{prestataire}', [BackendAdminController::class, 'accepterPrestataire']);


Route::get('/liste/prestation', [AdminController::class, 'liste_prestation'])->name("liste-prestation");
Route::post('/save.prestation', [AdminController::class, 'save_prestation'])->name("save.prestation");
Route::put('/prestation.upate/{prestation}', [AdminController::class, 'update'])->name("prestation.upate");
Route::delete('/delete.prestation/{prestation}', [AdminController::class, 'delete'])->name("delete.prestation");

//MESSAGE CONTACTS
Route::get('/message/contact', [ContactController::class, 'message_contact'])->name("message/contact");
Route::delete('/delete.messagecontact/{id}', [ContactController::class, 'destroy_message_contact'])->name("delete.messagecontact");

//LISTE DES DEMANDES DE PRESTATIONS
Route::get('/liste/demande_prestation', [AdminController::class, 'liste_demande_prestation'])->name("liste/demande_prestation");
Route::put('/update.demande/{demandeprestation}', [AdminController::class, 'update_demande'])->name("update.demande");
Route::delete('/delete.demande/{id}', [AdminController::class, 'deletedemande'])->name("delete.demande");

//NOS PRESTATIONS
Route::get('/liste/prestation', [BackendAdminController::class, 'liste_prestation'])->name("liste-prestation");
Route::post('/save.prestation', [BackendAdminController::class, 'save_prestation'])->name("save.prestation");
Route::put('/prestation.upate/{prestation}', [BackendAdminController::class, 'update'])->name("prestation.upate");
// Route::delete('/delete.prestation/{prestation}', [BackendAdminController::class, 'delete'])->name("delete.prestation");


//LISTE DES DEMANDES DE PRESTATIONS
Route::get('/liste/demande_prestation', [BackendAdminController::class, 'liste_demande_prestation'])->name("liste/demande_prestation");
Route::put('/update.demande/{demandeprestation}', [BackendAdminController::class, 'update_demande'])->name("update.demande");
Route::delete('/delete.demande/{id}', [BackendAdminController::class, 'deletedemande'])->name("delete.demande");
Route::get('/demande/fiche/{id}', [BackendAdminController::class, 'fiche'])->name("demande.fiche");
Route::post('/demande/archive/{demandeprestation}', [BackendAdminController::class, 'archive'])->name("adhesion.archive");
Route::get('/backend/demandes/archive', [BackendAdminController::class, 'archiveList'])->name("backend.demandes/archive");
Route::get('/backend/demande/archiveReset/{demandeprestation}', [BackendAdminController::class, 'archiveReset'])->name("demande.archiveReset");


//LISTE DES PRESTATAIRES
Route::get('/liste/devenirprestataire', [BackendAdminController::class, 'list_prestataire'])->name("liste/devenirprestataire");
Route::put('/update.prestataire/{prestataire}', [BackendAdminController::class, 'update_prestataire'])->name("update.prestataire");
Route::delete('/delete.prestataire/{id}', [BackendAdminController::class, 'delete_prestataire'])->name("delete.prestataire");
Route::get('/fiche/prestataire/{id}', [BackendAdminController::class, 'fiche_prestataire'])->name("prestataire.fiche");
Route::post('/backend/prestataire/archive/{prestataire}', [BackendAdminController::class, 'archive_prestataire'])->name("prestataire.archive");
Route::get('/backend/adhesions/archive', [BackendAdminController::class, 'PrestataireArchiveList'])->name("backend.prestataire/archive");
Route::get('/prestataire/archiveReset/{prestataire}', [BackendAdminController::class, 'archiveRestaurer'])->name("prestataire.archiveReset");
//ARCHIVAGES


//AJOUT ETHNIES
Route::get('/liste.ethnie', [BackendAdminController::class, 'liste_ethnie'])->name("liste.ethnie");
Route::post('/save_ethnie', [BackendAdminController::class, 'enregis_ethnie'])->name("save_ethnie");
Route::put('/ethnie.update/{ethnie}', [BackendAdminController::class, 'update_ethnie'])->name("ethnie.update");
Route::delete('/delete.ethnie/{ethnie}', [BackendAdminController::class, 'delete_ethnie'])->name("delete.ethnie");

//AJOUT MODES
Route::get('/liste.modes', [BackendAdminController::class, 'liste_mode'])->name("liste.modes");
Route::post('/store.mode', [BackendAdminController::class, 'enregis_mode'])->name("store.mode");
Route::put('/update.mode/{mode}', [BackendAdminController::class, 'update_mode'])->name("update.mode");
Route::delete('/delete.mode/{id}', [BackendAdminController::class, 'delete_mode'])->name("delete.mode");


//MODE DEPARTEMENT
Route::get('/backends/mode/departement', [BackendAdminController::class, 'mode_departement']);
Route::post('/save/mode/departement', [BackendAdminController::class, 'save_mode_departement'])->name("save.mode");
Route::put('/update/mode/departement/{modedepartement}', [BackendAdminController::class, 'update_mode_departement'])->name('mode.update');
Route::delete('/mode/departement/delete/{id}', [BackendAdminController::class, 'delete_mode_depart']);


//Departement mode
Route::get('/departement/mode', [BackendAdminController::class, 'depart_mode']);

Route::post('/backend/departement/mode', [BackendAdminController::class, 'save_depart_mode'])->name('departement.mode');

Route::post('/depart/mode/{departmode}', [BackendAdminController::class, 'departmode_update'])->name("depart.mode");

Route::delete('/destroy/departmode/{id}', [BackendAdminController::class, 'delete_depart']);



//MODE DE PRESTATIONS
Route::get('/backends/modes/prestations', [BackendAdminController::class, 'mode_presta'])->name("admin.mode_prestations.index");
Route::post('/modeprestation', [BackendAdminController::class, 'save_mode_prestation'])->name("modeprestation");
Route::put('/update/mode/prestation/{mode_presta}', [BackendAdminController::class, 'update_mode_prestation']);
Route::delete('/delete/{mode_presta}', [BackendAdminController::class, 'destroy_mode_presta'])->name("delete");


//AJOUT DIPLOMES
Route::get('/ajout/diplome', [BackendAdminController::class, 'liste_diplome'])->name("ajout/diplome");
Route::post('/save/diplome', [BackendAdminController::class, 'enregis_diplome'])->name("save/diplome");
Route::put('/update.diplome/{diplome}', [BackendAdminController::class, 'update_diplome'])->name("update.diplome");
Route::delete('/delete.diplome/{diplome}', [BackendAdminController::class, 'delete_diplome'])->name("delete.diplome");

//AJOUT ALPHABETISATION
Route::get('/ajout/alphabetisation', [BackendAdminController::class, 'add_alphabet'])->name("ajout/alphabetisation");
Route::post('/save.alphabet', [BackendAdminController::class, 'enregistre_alphabet'])->name("save.alphabet");
Route::put('/update.alpha/{alphabet}', [BackendAdminController::class, 'update_alphabet'])->name("update.alpha");
Route::delete('/delete.alpha/{alphabet}', [BackendAdminController::class, 'delete_alphabet'])->name("delete.alpha");

//AJOUT CANAL DE RENCONTRE AVEC ALLO SERVICE
Route::get('/ajout.rencontre', [BackendAdminController::class, 'ajout_canal_rencontre'])->name("ajout.rencontre");
Route::post('/store.canal', [BackendAdminController::class, 'save_canal_rencontre'])->name("store.canal");
Route::put('/update.canal/{canal}', [BackendAdminController::class, 'updatecanal'])->name("update.canal");
Route::delete('/delete.canal/{id}', [BackendAdminController::class, 'delete_canal'])->name("delete.canal");

//AJOUT DE DISPONIBILITE
Route::get('/ajout.disponibilite', [BackendAdminController::class, 'add_dispo'])->name("ajout.disponibilite");
Route::post('/save.dispo', [BackendAdminController::class, 'save_dispo'])->name("save.dispo");
Route::put('/update.disponibilite/{dispo}', [BackendAdminController::class, 'update_dispo'])->name("update.disponibilite");
Route::delete('/delete.dispo/{id}', [BackendAdminController::class, 'delete_dispo'])->name("delete.dispo");

//NATURE PIECES
Route::get('/nature.piece', [BackendAdminController::class, 'nature_piece'])->name("nature.piece");
Route::post('/store.pieces', [BackendAdminController::class, 'save_nature_piece'])->name("store.pieces");
Route::put('/update.piece/{naturepiece}', [BackendAdminController::class, 'update_piece'])->name("update.piece");
Route::delete('/delete.naturepiece/{id}', [BackendAdminController::class, 'delete_nature_piece'])->name("delete.naturepiece");

//AJOUT COMMUNE
Route::get('/communes', [BackendAdminController::class, 'list_commune'])->name("ajout.commune");
Route::post('/store.commune', [BackendAdminController::class, 'save_commune'])->name("store.commune");
Route::put('/update.commune/{comm}', [BackendAdminController::class, 'update_commune'])->name("update.commune");
Route::delete('/delete.commune/{id}', [BackendAdminController::class, 'delete_commune'])->name("delete.commune");

//AJOUT DOMAINE
Route::get('/ajout/quartier', [BackendAdminController::class, 'add_quartier'])->name("ajout/quartier");
Route::post('/store.quartier', [BackendAdminController::class, 'save_quartier'])->name("store.quartier");
Route::put('/update.quartier/{quartier}', [BackendAdminController::class, 'update_tiek'])->name("update.quartier");
Route::delete('/destroy.quartier/{id}', [BackendAdminController::class, 'destroy'])->name("destroy.quartier");

//VILLES
Route::get('/backends/villes', [BackendAdminController::class, 'cities'])->name('admin.villes.cities');
Route::post('/admin/villes/cities', [BackendAdminController::class, 'save_ville'])->name('admin/villes/cities');
Route::put('/update.ville/{city}', [BackendAdminController::class, 'update_ville'])->name('update.ville');
Route::delete('/delete/ville/{id}', [BackendAdminController::class, 'destroy_ville'])->name("delete.ville");

//DEVIS
Route::get('/backends/devis', [BackendAdminController::class, 'listedevis'])->name('backends.devis');
Route::put('/update.devis/{id}', [BackendAdminController::class, 'update_devis'])->name('update.devis');
Route::delete('/delete/devis/{devi}', [BackendAdminController::class, 'delete_devis'])->name('delete.devis');


//REALISATIONS
Route::get('/backends/realisations', [BackendAdminController::class, 'realisation'])->name('realisations');
Route::post('/realisation/store', [BackendAdminController::class, 'store'])->name('realisation.store');
Route::put('/realisation/update/{real}', [BackendAdminController::class, "update_realisation"])->name('realisation.update');
Route::delete('/realisation/destroy/{real}', [BackendAdminController::class, "destroy_realisation"])->name('realisation.destroy');

//AUTRES SERVICES
Route::get('/backends/services', [BackendAdminController::class, 'services']);
Route::post('/store/backends/services', [BackendAdminController::class, 'save_service'])->name('store.services');
Route::put('/update/service/{service}', [BackendAdminController::class, 'update_service'])->name('update.service');
Route::delete('/delete/service/{id}', [BackendAdminController::class, 'delete_service'])->name("service.delete");


//ABOUT
Route::get('/ajout.about', [AboutController::class, 'presentation'])->name("ajout.about");
Route::post('/save.about', [AboutController::class, 'store'])->name("save.about");
Route::put('/about.update/{about}', [AboutController::class, 'update'])->name("about.update");
Route::delete('/delete.about/{about}', [AboutController::class, 'destroy_about'])->name("delete.about");

//ASSISTANCE
Route::get('/ajout.assistance', [AssistanceController::class, 'add_assist'])->name("ajout.assistance");
Route::post('/save.assistance', [AssistanceController::class, 'store_assistance'])->name("save.assistance");
Route::put('/update.assistance/{assistance}', [AssistanceController::class, 'update'])->name("update.assistance");
Route::delete('/delete.assistance/{assistance}', [AssistanceController::class, 'delete_assistance'])->name("delete.assistance");

//DOMAINE ACTIVITY
Route::get('/activity.domaine', [DomaineController::class, 'add_domaine'])->name("activity.domaine");
Route::post('/save_domaine_activity', [DomaineController::class, 'store_domaine'])->name("save_domaine_activity");
Route::put('update.domaine/{domaine}', [DomaineController::class, 'update_domaine_activity'])->name("update.domaine");
Route::delete('delete.domaine/{id}',[DomaineController::class, 'destroy_activity_domaine'])->name("delete.domaine");

//MESSAGE CONTACTS
Route::get('/message/contact', [ContactController::class, 'message_contact'])->name("message/contact");
Route::delete('/delete.messagecontact/{id}', [ContactController::class, 'destroy_message_contact'])->name("delete.messagecontact");

//LISTE TEMOIGNAGES
Route::get('/liste.temoignages', [TemoignageController::class, 'show_temoignage'])->name("liste.temoignages");
Route::post('/save.temoignage', [TemoignageController::class, 'save_temoignage'])->name("save.temoignage");
Route::get('/statut', [TemoignageController::class, 'etat'])->name("statut");
Route::post('/save.statut', [TemoignageController::class, 'store_statut'])->name("save.statut");
Route::put('/backends/update/statut/{etat}', [TemoignageController::class, 'update'])->name("statut.update");
Route::delete('/backend/statut/delete/{id}', [TemoignageController::class, 'delete'])->name("statut.delete");

Route::put('update.temoignage/{temoignage}', [TemoignageController::class, 'update_temoignage'])->name("update.temoignage");
Route::delete('delete.temoignage/{id}', [TemoignageController::class, 'destroy_temoignage'])->name("delete.temoignage");

//DEPARTEMENTS
Route::get('/backends/departements', [DepartementController::class, 'index']);
Route::post('/backends/store/departements', [DepartementController::class, 'store'])->name('admin.departement.index');
Route::put('/departement.update/{id}', [DepartementController::class, 'update'])->name('departement.update');
Route::delete('/delete.departement/{id}', [DepartementController::class, 'delete'])->name('delete.departement');

//QUESTIONS  DEVIS
Route::get('/ListeMaison', [BackendAdminController::class, 'ListeMaison'])->name('ListeMaison');
Route::post('/save/house', [BackendAdminController::class, 'save_house'])->name('save/house');
Route::put('/update/house/{house}', [BackendAdminController::class, 'UpdateHouse'])->name('update.house');
Route::delete('/delete/house/{id}', [BackendAdminController::class, 'DeleteHouse'])->name("delete.house");

Route::get('/ListeSurface', [BackendAdminController::class, 'ListeSurface'])->name('ListeSurface');
Route::post('/save_surface_piece', [BackendAdminController::class, 'SaveSurfacePiece'])->name('save_surface_piece');
Route::put('/update/surface/{surface_piece}', [BackendAdminController::class, 'UpdateSurfacePiece'])->name('update.surface');
Route::delete('/delete.surface/{id}', [BackendAdminController::class, 'DeleteSurface'])->name("delete.surface");

Route::get('/ListeSituationHouse', [BackendAdminController::class, 'ListeSituationHouse'])->name('ListeSituationHouse');
Route::post('/save', [BackendAdminController::class, 'save'])->name('save');
Route::put('/update.situahouse/{situa_house}', [BackendAdminController::class, 'UpdateSituationHouse'])->name('update.situahouse');
Route::delete('/delete.situa_house/{id}', [BackendAdminController::class, 'DeleteSituationHouse'])->name("delete.situa_house");

Route::get('/devis/fiche/{id}', [BackendAdminController::class, 'FicheDevis'])->name("devis.fiche");

