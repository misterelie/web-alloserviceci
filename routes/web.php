<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Backend\AdminController;
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


// FRONT
Route::get('/', [HomeController::class, 'index'])->name("Home.app");

Route::get('/presentation', [InterfacesFrontController::class, 'vu_about'])->name("front.presentaion");
route::get('/nos-prestations', [InterfacesFrontController::class, 'all_prestations'])->name("front.nos-prestations");
Route::get('/ask.prestation', [InterfacesFrontController::class, 'demande_prestation'])->name("ask.prestation");
Route::post('/save.demandeprestation', [InterfacesFrontController::class, 'store'])->name("save.demandeprestation");
Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");
Route::get('/nous-contacter', [InterfacesFrontController::class, 'send_contact'])->name("front.contact");
Route::post('/save_contact', [InterfacesFrontController::class, 'store_contact'])->name("save_contact");
Route::get('/ask.prestataire', [InterfacesFrontController::class, 'prestataire'])->name("ask.prestataire");
Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");
Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");
Route::get('/demande-prest/{id}', [InterfacesFrontController::class, 'demande_prest'])->name("front.prest");
Route::get('/devenir-presta/{id}', [InterfacesFrontController::class, 'demande_presta'])->name("front.presta");

//ADMINISTRATION
//nos prestations

Route::get('/liste/prestation', [AdminController::class, 'liste_prestation'])->name("liste-prestation");
Route::post('/save.prestation', [AdminController::class, 'save_prestation'])->name("save.prestation");
Route::put('/prestation.upate/{prestation}', [AdminController::class, 'update'])->name("prestation.upate");
Route::delete('/delete.prestation/{demandeprestation}', [AdminController::class, 'delete'])->name("delete.prestation");

//MESSAGE CONTACTS
Route::get('/message/contact', [ContactController::class, 'message_contact'])->name("message/contact");
Route::delete('/delete.messagecontact/{id}', [ContactController::class, 'destroy_message_contact'])->name("delete.messagecontact");

//LISTE DES DEMANDES DE PRESTATIONS
Route::get('/liste/demande_prestation', [AdminController::class, 'liste_demande_prestation'])->name("liste/demande_prestation");
Route::put('/update.demande/{demandeprestation}', [AdminController::class, 'update_demande'])->name("update.demande");
Route::delete('/delete.demande/{id}', [AdminController::class, 'deletedemande'])->name("delete.demande");



Route::get('/administration', [AdminController::class, 'dasboard']);