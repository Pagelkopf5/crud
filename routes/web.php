<?php

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
    return view('index');
})->name('index');

Route::get('/create_contato', function  () {
    return view('create_contato');
})->name('create_contato');

Route::get('/create_empresa', function () {
    return view('create_empresa');
})->name('create_empresa');

Route::post('/creating_contato', function () {
    return view('index');
});

Route::post('/creating_empresa', function () {
    return view('index');
});