<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
                ->namespace('Admin')
                //->middleware('auth')
                ->group(function(){



   /**
    * Routes Municípios
    */
    Route::any('municipios/search', 'MunicipioController@search')->name('municipios.search');
    Route::resource('municipios', 'MunicipioController');

    //rota Admin
    Route::get('/', 'MunicipioController@index')->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});
