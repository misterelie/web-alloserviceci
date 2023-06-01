<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Home.app');
})->name('app_accueil');

Route::get('/presentation', function () {
    return view('Home.presentation');
})->name('app_presentation');

Route::get('/nosPrestation', function () {
    return view('Home.nosprestation');
})->name('app_nosprestation');

Route::get('/nosPrestation', function () {
    return view('Home.nosprestation');
})->name('app_nosprestation');

Route::get('/prestation', function () {
    return view('Home.demandedeprestation');
})->name('app_prestation');

Route::post('/store.prestation', [FrontController::class, 'save_prestation'])->name("store.prestation");

Route::get('/devenirprestataire', function () {
    return view('Home.devenirprestataire');
})->name('app_devenirprestataire');

Route::post('/store.devenir', [FrontController::class, 'save_devenir'])->name("store.devenir");

Route::get('/contact', function () {
    return view('Home.contact');
})->name('app_contact');


Route::get('/tabeau-de-bord', [HomeController::class, 'adminIndex'])->name("admin.index");

Route::post('/store.contact', [FrontController::class, 'save_contact'])->name("store.contact");



// Route::get('/admin', function () {
//     return view('dashboard.admin');
// })->name('app_admin');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');