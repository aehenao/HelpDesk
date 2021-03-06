<?php

use Illuminate\Support\Facades\Route;
use App\apiTeamViewer\Conexion;
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
  // $conn = new Conexion();
  // $response = $conn->data();

  return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas para Notas Vuejs
Route::get('/cases/{case}/notes', 'NotesController@show');
Route::post('/cases/{case}/notesCreate', 'NotesController@store');
Route::get('/openCase/{case}/notes', 'NotesController@show');
Route::post('/openCase/{case}/notesCreate', 'NotesController@store');

//Consulta de Casos Vuejs
Route::get('/cases/search/{search}', 'Admin\CasesController@getSearch');

Route::get('/profile', 'ProfileController@edit');
Route::put('/profile', 'ProfileController@update');

Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function() {

Route::get('/cases', 'CasesController@index');
//Ruta para obtener casos por medio de Vuejs
Route::get('/cases/all', 'CasesController@getCases');

Route::get('/cases/create', 'CasesController@create');
Route::post('/cases', 'CasesController@store');
Route::get('/cases/{case}/edit', 'CasesController@edit');
Route::put('/cases/{case}', 'CasesController@update');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
Route::put('/categories/{category}', 'CategoryController@update');

Route::resource('specialist', 'SpecialistController');
Route::resource('clients', 'ClientController');
});

Route::middleware(['auth', 'aux'])->namespace('Assistant')->group(function() {

Route::get('/inbox', 'AuxController@index');
Route::get('/inbox/cases/{specialist}', 'AuxController@getCases'); //ruta para obtener los caso por medio de Vuejs

Route::get('/openCase/{id}/edit', 'AuxController@edit');
Route::put('/saveCase/{id}', 'AuxController@update');

});
