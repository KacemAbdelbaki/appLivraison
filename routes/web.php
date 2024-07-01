<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\PersonnelsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajouterRestaurant', function () {
    return view('Administrateur/restaurant');
})->name('ajouterRestaurant');



Route::get('/categorie', [CategorieController::class, 'index'])->name('listeCategorie');
Route::post('/categorie', [CategorieController::class, 'store'])->name('categorie.store');

Route::post('/categorieU', [CategorieController::class, 'updateCategorie'])->name('categorie.update');

Route::get('/listeCategorie', [CategorieController::class, 'getCategorie'])->name('listeCategorie');

Route::get('/modifierCategorie/{id}', [CategorieController::class, 'getCategorieId'])->name('modifierCategorie');

Route::get('/supprimerCategorie/{id}', [CategorieController::class, 'deleteCategorie'])->name('supprimerCategorie');

Route::get('/ajouterCategorie', function () {
    return view('Administrateur/categorie');
})->name('ajouterCategorie');
//////////////////////////////////////////////////////////////////////////////

Route::get('/Supplement', function () {
    return view('Administrateur/supplement');
})->name('Supplement');


Route::get('/admin', function () {
    return view('Administrateur/index');
});



Route::get('/home', function () {
    return view('Administrateur/dashboard');
})->name('home');

Route::post(
    '/submit-form',
    [AdminController::class, 'submit']
)->name('form.submit');


// ------------------------------------------------------------------------------------------------------------------->
// verified that i need 
// client
Route::get('/client', [ClientController::class, 'index'])->name('listeClient');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');
Route::post('/clientU', [ClientController::class, 'updateClient'])->name('client.update');
Route::get('/listeClient', [ClientController::class, 'getClient'])->name('listeClient');
Route::get('/modifierClient/{id}', [ClientController::class, 'getClientId'])->name('modifierClient');
Route::get('/supprimerClient/{id}', [ClientController::class, 'deleteClient'])->name('supprimerClient');
Route::get('/ajouterClient', function () {
    return view('Administrateur/client');
})->name('ajouterClient');

// personnel
Route::get('/personnel', [PersonnelsController::class, 'index'])->name('listePersonnel');
Route::post('/personnel', [PersonnelsController::class, 'store'])->name('personnel.store');
Route::post('/personnelU/{id}', [PersonnelsController::class, 'updatePersonnel'])->name('personnel.update');
Route::get('/listePersonnels', [PersonnelsController::class, 'listePersonnel'])->name('listePersonnels');
Route::get('/modifierPersonnel/{id}', [PersonnelsController::class, 'getPersonnelId'])->name('modifierPersonnel');
Route::get('/supprimerPersonnel/{id}', [PersonnelsController::class, 'deletePersonnel'])->name('supprimerPersonnel');
Route::get('/ajouterPersonnel', function () {
    return view('Administrateur/ajouterPersonnel');
})->name('ajouterPersonnel');

// transporteur
Route::get('/transporteur', [TransporteurController::class, 'getTransporteurs'])->name('listeTransporteurs');
Route::get('/ajouterTransporteur', [TransporteurController::class, 'ajouterTransporteur'])->name('ajouterTransporteur');
Route::post('/transporteur', [TransporteurController::class, 'store'])->name('transporteur.store');
Route::get('/modifierTransporteur/{id}', [TransporteurController::class, 'getTransporteurId'])->name('modifierTransporteur');
Route::post('/transporteurU', [TransporteurController::class, 'updateTransporteur'])->name('transporteur.update');
Route::get('/supprimerTransporteur/{id}', [TransporteurController::class, 'deleteTransporteur'])->name('supprimerTransporteur');