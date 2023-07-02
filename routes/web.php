<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\TemporaryResidenceFormController;
use App\Http\Controllers\TemporaryAbsenceFormController;

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
    return redirect('/dashboard');
});

Route::get('/dashboard',[PeopleController::class,'calculateChart'])->middleware(['auth', 'verified'])->name('pages.dashboard');

Route::get('household/list', [HouseholdController::class,'getAllHousehold'])->name('pages.house_hold_list');
Route::get('household/detail/{id}', [HouseholdController::class,'getHouseholdDetail'])->name('pages.house_hold_detail');
Route::get('household/detail/{id}/addNewPerson',[PeopleController::class,'addNewPerson'])->name('pages.add_new_person_into_household'); // them nhan khau vao 1 ho khau 
Route::post('household/detail/{id}/addNewPerson',[PeopleController::class,'storeNewPerson'])->name('pages.store_new_person_into_household');

Route::get('household/search','HouseholdController@search'); // can sua lai 
Route::get('household/add', function () {
    return view('pages/house_hold_create');
})->name('pages.house_hold_add');
Route::get('household/sendInfo',[HouseholdController::class,'sendInfo'])->name('pages.house_hold_send_info');

Route::get('household/create_owner',[HouseholdController::class, 'createHousehold'])->name('pages.create_owner');
Route::post('household/create_owner',[HouseholdController::class, 'storeHousehold'])->name('pages.store_owner');
Route::get('household/add_people',[HouseholdController::class,'addNewPeopleToHousehold'])->name('pages.add_new_person');
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

Route::get('absent/list', [TemporaryAbsenceFormController::class,'getAll'])->name('pages.absent_list');
Route::get('absent/detail/{id}', [TemporaryAbsenceFormController::class,'absentInfoDetail'])->name('pages.absent_detail');
Route::get('absent/add', [TemporaryAbsenceFormController::class,'create'])->name('pages.absent_add');
Route::post('absent/add',[TemporaryAbsenceFormController::class,'store'])->name('pages.absent_store');
Route::get('getOnePerson/{id}',[TemporaryAbsenceFormController::class,'getOnePerson']);
Route::get('absent/delete/{id}',[TemporaryAbsenceFormController::class,'destroy'])->name('pages.absent_destroy');

Route::get('meeting/list', [MeetingController::class,'getAllMeeting'])->name('pages.meeting_list');
Route::get('meeting/detail/{id}',[MeetingController::class,'getMeetingDetail'])->name('pages.meeting_detail');
Route::get('meeting/manage', function () {return view('pages.meeting_manage');})->name('pages.meeting_manage');
Route::get('meeting/add', function() { return view('pages.meeting_create_form');})->name('pages.meeting_add');
Route::post('meeting/add',[MeetingController::class,'store'])->name('pages.meeting_store');
// Route::get('test/form', function () {
//     return view('pages.test_form');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('meetings', MeetingController::class);

Route::get('/edit-meeting/{meeting_id}','App\Http\Controllers\MeetingController@edit');

Route::put('/update-meeting/{meeting_id}','App\Http\Controllers\MeetingController@update');
Route::get('/search-meeting','App\Http\Controllers\MeetingController@search');
Route::get('/delete-meeting/{meeting_id}','App\Http\Controllers\MeetingController@destroy');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
