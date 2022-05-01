<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\historiaclinica;
use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roleController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
}); 

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', roleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::get('medico/especialidad/{id}', [MedicoController::class,'especialidad']);
Route::post('medico/esp_store', [MedicoController::class,'esp_store']);
Route::resource('historiaclinica', historiaclinica::class)->names('historiaclinica');
Route::resource('subir', FilesController::class)->names('subir');
Route::resource('bitacora',BitacoraController::class)->names('bitacora');
Route::post('login', [UserController::class,'login']);
Route::resource('medico', MedicoController::class)->names('medico');


