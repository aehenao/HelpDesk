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

  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function() {

Route::get('/cases', 'CasesController@index');
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
