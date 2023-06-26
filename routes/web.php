<?php

use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemporaryResidenceFormController;
use App\Http\Controllers\TemporaryAbsenceFormController;

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

Route::get('/dashboard',[PeopleController::class,'calculateChart'])->name('pages.dashboard');

Route::get('household/list', [HouseholdController::class,'getAllHousehold'])->name('pages.house_hold_list');
Route::get('household/detail/{id}', [HouseholdController::class,'getHouseholdDetail'])->name('pages.house_hold_detail');
Route::get('household/search','HouseholdController@search'); // can sua lai 
Route::get('/household/add', function () {
    return view('pages/house_hold_create');
})->name('pages.house_hold_add');

Route::get('household/create_owner',[HouseholdController::class, 'createHousehold'])->name('pages.create_owner');
Route::post('household/create_owner',[HouseholdController::class, 'storeHousehold'])->name('pages.store_owner');
Route::get('household/add_people',[HouseholdController::class,'addNewPeopeleToHousehold'])->name('pages.add_new_person');
Route::post('household/add_people',[HouseholdController::class,'storeNewPeopleToHousehold'])->name('pages.store_new_person');
       
Route::get('people/list', [PeopleController::class,'getAllPeople'])->name('pages.people_list');
Route::get('people/detail/{id}', [PeopleController::class,'getPeopleDetail'])->name('pages.people_detail');


Route::get('/people/add', function () {
    return view('pages/people_create_form');
})->name('pages.people_add');

Route::get('/direction', function () {
    return view('pages/staying_absent_direction');
})->name('pages.staying_absent_direction');

Route::get('staying/list', [TemporaryResidenceFormController::class,'getTemporaryResidenceForm'])->name('pages.staying_list');
Route::get('staying/detail/{id}',[TemporaryResidenceFormController::class,'getInfoDetails'])->name('pages.staying_detail');
Route::get('staying/add', [TemporaryResidenceFormController::class,'create'])->name('pages.staying_create_form');
Route::post('staying/add',[TemporaryResidenceFormController::class,'store'])->name('pages.staying_create_form_store');
Route::get('staying/delete/{id}',[TemporaryResidenceFormController::class,'destroy'])->name('pages.staying_list_delete');

Route::get('absent/list', function () {
    return view('pages/temporarily_absent_list');
})->name('pages.absent_list');

Route::get('absent/detail', function () {
    return view('pages/temporarily_absent_detail');
})->name('pages.absent_detail');

Route::get('absent/add', function () {
    return view('pages/temporarily_absent_create_form');
})->name('pages.absent_add');

// Route::get('meeting/list', function () {
//     return view('pages/meeting_list');
// });
Route::get('meeting/list', [MeetingController::class,'getAllMeeting'])->name('pages.meeting_list');


Route::get('meeting/manage', function () {
    return view('pages.meeting_manage');
})->name('pages.meeting_manage');

Route::get('test/form', function () {
    return view('pages.test_form');
});
