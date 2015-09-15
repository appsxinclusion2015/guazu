<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('index');
});
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/jugar/{ambiente}', function () {
    return view('jugar');
});
Route::get('/cargar-imagenes/{ambiente}', function () {
    return view('cargar');
});

Route::get('/cargar-imagenes2', function () {
    return view('cargar_resize');
});

Route::get('/elegir-ambiente', function () {
    return view('elegir-ambiente');
});
Route::get('/test-json', function () {
    return view('jsonobjetos');
});
Route::post('/subir', function () {
   //en controlle
   // use Illuminate\Http\Request;r
//$request->file('foto')->move("/", "hola.jpg");
});
