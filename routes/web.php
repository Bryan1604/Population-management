<?php

use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PeopleController;
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
    return view('layouts/main');
});

Route::get('/dashboard',[PeopleController::class,'calculateChart'])->name('pages/dashboard');
// Route::get('/dashboard', function () {
//     return view('pages/dashboard');
// });

Route::get('household/list', [HouseholdController::class,'getAllHousehold'])->name('pages/house_hold_list');
Route::get('household/detail/{id}', [HouseholdController::class,'getHouseholdDetail'])->name('pages/house_hold_detail');
//Route::get('household/search',[HouseholdController::class,'search']);
Route::get('household/search','HouseholdController@search');


// Route::get('/household/detail', function () {
//     return view('pages/house_hold_detail');
// });

Route::get('/household/add', function () {
    return view('pages/house_hold_create');
});

Route::get('/people/list', function () {
    return view('pages/people_list');
});
Route::get('people/detail/{id}', [PeopleController::class,'getPeopleDetail'])->name('pages/people_detail');


// Route::get('/people/detail', function () {
//     return view('pages/people_detail');
// });

Route::get('/people/add', function () {
    return view('pages/people_create_form');
});

Route::get('/direction', function () {
    return view('pages/staying_absent_direction');
});

Route::get('staying/list', function () {
    return view('pages/staying_list');
});

Route::get('staying/detail', function () {
    return view('pages/staying_detail');
});

Route::get('staying/add', function () {
    return view('pages/staying_create_form');
});

Route::get('absent/list', function () {
    return view('pages/temporarily_absent_list');
});

Route::get('absent/detail', function () {
    return view('pages/temporarily_absent_detail');
});

Route::get('absent/add', function () {
    return view('pages/temporarily_absent_create_form');
});

// Route::get('meeting/list', function () {
//     return view('pages/meeting_list');
// });
Route::get('meeting/list', [MeetingController::class,'getAllMeeting'])->name('pages/meeting_list');


Route::get('meeting/manage', function () {
    return view('pages/meeting_manage');
});

Route::get('test/form', function () {
    return view('pages/test_form');
});

Route::get('/demo',[TemporaryResidenceFormController::class,'getTemporaryResidenceForm'])->name('demo');
Route::get('/demo/{id}', [TemporaryResidenceFormController::class, 'getInfoDetails'])->name('demo');

