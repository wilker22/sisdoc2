<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
                ->namespace('Admin')
                //->middleware('auth')
                ->group(function(){


    /**
    * Routes Documentos
    */
    Route::any('documentos/search', 'DocumentoController@search')->name('documentos.search');
    Route::resource('documentos', 'DocumentoController');

    /**
    * Routes Setores
    */
    Route::any('setores/search', 'SetorController@search')->name('setores.search');
    Route::resource('setores', 'SetorController');


   /**
    * Routes Municípios
    */
    Route::any('municipios/search', 'MunicipioController@search')->name('municipios.search');
    Route::resource('municipios', 'MunicipioController');

    //rota Admin
    Route::get('/', 'DocumentoController@index')->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
