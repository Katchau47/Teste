<?php

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

Route::get('/', 'SiteController@home');

Route::get('/inicio', 'SiteController@home');

Route::resource('clientes','ClientController');

Route::get('tabelas/clientes', 'ClientController@tabclient');

Route::get('tabelas/clientes/grafico', 'ClientController@Grafico');

Route::resource('carros','CarController');

Route::get('tabelas/carros', 'CarController@tabcarros');

Route::get('tabelas/carros/grafico1', 'CarController@Grafico');

Route::get('tabelas/carros/grafico2', 'CarController@Grafico2');

Route::get('tabelas/carros/grafico3', 'CarController@Grafico3');

Route::get('tabelas2/carros/grafico4', 'CarController@Grafico4');

Route::get('tabelas2/carros/grafico5', 'CarController@Grafico5');

Route::get('tabelas2/carros', 'CarController@tab2carros');

Route::resource('revisao','RevController');

Route::get('tabelas/revisao', 'RevController@tabrevis');

Route::get('tabelas/revisao/grafico', 'RevController@Grafico');

Route::get('tabelas/revisao/grafico2', 'RevController@Grafico2');