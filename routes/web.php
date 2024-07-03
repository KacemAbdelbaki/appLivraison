<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SousCategoriesController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\EquipeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajouterRestaurant', function () {
    return view('Administrateur/restaurant');
})->name('ajouterRestaurant');

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
    return view('Administrateur/client/client');
})->name('ajouterClient');

// personnel
Route::get('/personnel', [PersonnelsController::class, 'index'])->name('listePersonnel');
Route::post('/personnel', [PersonnelsController::class, 'store'])->name('personnel.store');
Route::post('/personnelU/{id}', [PersonnelsController::class, 'updatePersonnel'])->name('personnel.update');
Route::get('/listePersonnels', [PersonnelsController::class, 'listePersonnel'])->name('listePersonnels');
Route::get('/modifierPersonnel/{id}', [PersonnelsController::class, 'getPersonnelId'])->name('modifierPersonnel');
Route::get('/supprimerPersonnel/{id}', [PersonnelsController::class, 'deletePersonnel'])->name('supprimerPersonnel');
Route::get('/ajouterPersonnel', function () {
    return view('Administrateur/personnels/ajouterPersonnel');
})->name('ajouterPersonnel');

// transporteur
Route::get('/transporteur', [TransporteurController::class, 'getTransporteurs'])->name('listeTransporteurs');
Route::get('/ajouterTransporteur', [TransporteurController::class, 'ajouterTransporteur'])->name('ajouterTransporteur');
Route::post('/transporteur', [TransporteurController::class, 'store'])->name('transporteur.store');
Route::get('/modifierTransporteur/{id}', [TransporteurController::class, 'getTransporteurId'])->name('modifierTransporteur');
Route::post('/transporteurU', [TransporteurController::class, 'updateTransporteur'])->name('transporteur.update');
Route::get('/supprimerTransporteur/{id}', [TransporteurController::class, 'deleteTransporteur'])->name('supprimerTransporteur');

// equipe
Route::get('/equipe', [EquipeController::class, 'getEquipes'])->name('listeEquipes');
Route::get('/ajouterEquipe', [EquipeController::class, 'ajouterEquipe'])->name('ajouterEquipe');
Route::post('/equipe', [EquipeController::class, 'store'])->name('equipe.store');
Route::get('/modifierEquipe/{id}', [EquipeController::class, 'getEquipeId'])->name('modifierEquipe');
Route::post('/equipeU', [EquipeController::class, 'updateEquipe'])->name('equipe.update');
Route::get('/supprimerEquipe/{id}', [EquipeController::class, 'deleteEquipe'])->name('supprimerEquipe');

// categories
Route::get('/categorie', [CategoriesController::class, 'getCategories'])->name('listeCategories');
Route::get('/ajouterCategorie', function () {
    return view('Administrateur/categorie/ajouterCategorie');
})->name('ajouterCategorie');
Route::post('/categorie', [CategoriesController::class, 'store'])->name('categorie.store');
Route::get('/modifierCategorie/{id}', [CategoriesController::class, 'getCategorieId'])->name('modifierCategorie');
Route::post('/categorieU', [CategoriesController::class, 'updateCategorie'])->name('categorie.update');
Route::get('/supprimerCategorie/{id}', [CategoriesController::class, 'deleteCategorie'])->name('supprimerCategorie');

// sousCategories
Route::get('/sousCategorie', [SousCategoriesController::class, 'getSousCategories'])->name('listeSousCategories');
Route::get('/ajouterSousCategorie', [SousCategoriesController::class, 'ajouterSousCategorie'])->name('ajouterSousCategorie');
Route::post('/sousCategorie', [SousCategoriesController::class, 'store'])->name('sousCategorie.store');
Route::get('/modifierSousCategorie/{id}', [SousCategoriesController::class, 'getSousCategorieId'])->name('modifierSousCategorie');
Route::post('/sousCategorieU', [SousCategoriesController::class, 'updateSousCategorie'])->name('sousCategorie.update');
Route::get('/supprimerSousCategorie/{id}', [SousCategoriesController::class, 'deleteSousCategorie'])->name('supprimerSousCategorie');