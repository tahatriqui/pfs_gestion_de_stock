<?php

use App\Http\Controllers\affectationController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\devisionController;
use App\Http\Controllers\divisionController;
use App\Http\Controllers\etatController;
use App\Http\Controllers\marqueController;
use App\Http\Controllers\materielController;
use App\Http\Controllers\serviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// userController
Route::get('/user', [userController::class, "show"])->name('user');
Route::get('/show/user', [userController::class, "showuser"])->name('show.user');
Route::post('/ajouter/user', [userController::class, "ajouter"])->name('ajoute.user');
Route::put('/edit/user/{id}', [userController::class, "edit"])->name('user.edit');
Route::delete('/user/supprimer/{id}', [userController::class, "supprimer"])->name('delete.user');
Route::get('/user/modifier/{id}', [userController::class, "modifier"])->name("user.modifier");


//serviceController
Route::get('/service', [serviceController::class, "index"])->name('services.index');
Route::get('/service_view/ajouter', [serviceController::class, "ajouter"])->name('services_view.ajouter');
Route::get('/modifier/service/{id}', [serviceController::class, "modifier"])->name("services.modifier");
Route::post('/service/ajouter', [serviceController::class, "add"])->name('services.ajouter');
Route::put('/edit/service/{id}', [serviceController::class, "edit"])->name("services.edit");
Route::delete('/service/supprimer/{id}', [serviceController::class, "supprimer"])->name('delete.service');


//devisionController
Route::get('/divisions', [divisionController::class, "index"])->name('divisions.index');
Route::get('/divisions/ajouter', [divisionController::class, "ajouter"])->name('division.ajouter');
Route::post('/divisions/add', [divisionController::class, "add"])->name('division.add');
Route::delete('/divisions/delete/{id}', [divisionController::class, "supprimer"])->name('division.delete');
Route::get('devices/service_filre/{id}/{division}', [divisionController::class, "filtrer"])->name('division.filtre');
Route::get('/divisions/modifier/{id}', [divisionController::class, "modifier"])->name('division.modifier');
Route::put('/divisions/edit/{id}', [divisionController::class, "edit"])->name('division.edit');



//categoryController
Route::get('/categorie', [categorieController::class, "index"])->name('categorie.index');
Route::get('/categorie/ajouter', [categorieController::class, "ajouter"])->name('categorie.ajouter');
Route::post('/categorie/add', [categorieController::class, "add"])->name('categorie.add');
Route::get('/categorie/modification/{id}', [categorieController::class, "modification"])->name('categorie.modification');
Route::put('/categorie/edit/{id}', [categorieController::class, "edit"])->name('categorie.edit');
Route::delete('/categorie/delete/{id}', [categorieController::class, "delete"])->name('categorie.delete');
Route::get('/categorie/filre/{id}', [categorieController::class, "filtre"])->name('categorie.filtre');

//etatController
Route::get('/etat', [etatController::class, "index"])->name('etat.index');
Route::get('/etat/modifier/{id}', [etatController::class, "modifier"])->name('etat.modifier');
Route::get('/etat/ajouter', [etatController::class, "ajouterPage"])->name('etat.ajoutePage');
Route::put('/etat/edit/{id}', [etatController::class, "edit"])->name('etat.edit');
Route::delete('/etat/delete/{id}', [etatController::class, "delete"])->name('etat.delete');
Route::post('/etat/ajouter', [etatController::class, "ajouter"])->name('etat.ajouter');
Route::get('/etat/filtre/{id}/{filtre}', [etatController::class, "filtre"])->name('etat.filtre');

// materielController
Route::get('/', [materielController::class, "index"])->name("materiel.index");
Route::get('/materiel/ajouterPage', [materielController::class, "ajouterPage"])->name("materiel.ajouterPage");
Route::post('/materiel/ajouter', [materielController::class, "ajouter"])->name("materiel.ajouter");
Route::get('/materiel/modifierPage/{id}', [materielController::class, "modifierPage"])->name("materiel.modifierPage");
Route::put('/materiel/modifier/{id}', [materielController::class, "modifier"])->name("materiel.modifier");
Route::delete('/materiel/supprimer/{id}', [materielController::class, "supprimer"])->name("materiel.supprimer");

//marqueController
Route::get('/marque', [marqueController::class, "index"])->name("marque.index");
Route::get('/marque/ajouterPage', [marqueController::class, "ajouterPage"])->name("marque.ajoutePage");
Route::post('/marque/ajouterAjouter', [marqueController::class, "ajouter"])->name("marque.ajouter");
Route::get('/marque/modifier/{id}', [marqueController::class, "modifierPage"])->name("marque.modifier");
Route::put('/marque/edit/{id}', [marqueController::class, "edit"])->name("marque.edit");
Route::delete('/marque/delete/{id}', [marqueController::class, "delete"])->name("marque.delete");

//affectationCotnroller
Route::get('/affectation', [affectationController::class, "index"])->name("affectation.index");
Route::get('/affectation/ajouterPage', [affectationController::class, "ajouterPage"])->name("affectation.ajouterPage");
Route::post('/affectation/ajouter', [affectationController::class, "ajouter"])->name("affectation.ajouter");
Route::get('/affectation/modifierPage/{id}', [affectationController::class, "modifierPage"])->name("affectation.modifierPage");
Route::put('/affectation/modifier/{id}', [affectationController::class, "modifier"])->name("affectation.modifier");
Route::delete('/affectation/delete/{id}', [affectationController::class, "delete"])->name("delete.affectation");