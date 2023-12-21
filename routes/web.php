<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationLogin;

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


/**
 * ruta za glavnu stranicu
 */
Route::get('/', function () {
    return view('glavna');
});

/**
 * ruta koja vodi na stranicu za login
 */
Route::get('/login', [RegistrationLogin::class, 'loginView'])->name('login.index');

/**
 * ruta koja vodi na stranicu za registraciju
 */
Route::get('/registracija', [RegistrationLogin::class, 'registrationView'])->name('registracija.index');


/**
 * ruta koja vodi na controller koji obavlja "logiku" registracije
 * nakon uspješne registracije vraća nas nazad na stranicu za login s porukom da smo se uspješno registrirali.
 * */
Route::post('/registracija/performRegistration', [RegistrationLogin::class, 'preformRegistration'])->name('registracija.preformRegistration');


/**
 * ruta koja vodi na controller koji obavlja "logiku" login-a
 * nakon uspješnog logina preusmjerava se na rutu goAhead u nastavku.
 * */
Route::post('/login/performLogin', [RegistrationLogin::class, 'performLogin'])->name('performLogin');


/**
* ruta koja se poziva ako je uspješan login:
* ruta nije štićena autorizacijom.
*/
Route::get('/dalje', [RegistrationLogin::class, 'goAhead'])->name('goAhead');