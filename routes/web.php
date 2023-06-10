<?php

use App\Models\TemporaryResidenceForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemporaryResidenceFormController;
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
    return view('welcome');
});

Route::get('/people', function () {
    return view('pages/people/people');
});

Route::get('/demo',[TemporaryResidenceFormController::class,'getTemporaryResidenceForm'])->name('demo');
Route::get('/demo/{id}', [TemporaryResidenceFormController::class, 'getInfoDetails'])->name('demo');

