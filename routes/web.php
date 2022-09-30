<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthenticationAuthorizationController;
use App\Http\Controllers\UniversityAdministrationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//Admin
Route::get('admin/dashbord',[AdminController::class, 'adminDashbord']);
Route::get('admin/register/uni-admin', [AdminController::class, 'universityAdminRegister']);
Route::post('admin/register/uni-admin/add', [AdminController::class, 'universityAdminAdd']);

//Author
Route::get('author-paper-submission', [AuthorController::class, 'authorPaperSubmission']);


//Authentication and Authorization
Route::get('register/{user}', [AuthenticationAuthorizationController::class, 'createAccount']);
Route::post('register/admin', [AuthenticationAuthorizationController::class, 'addUser']);


//University Administrator 
Route::get('create-conference-paper', [UniversityAdministrationController::class, 'createConferencePaper']);
Route::get('dashboard/{user}', [UniversityAdministrationController::class, 'showDashboard']);
Route::get('conference-list',[UniversityAdministrationController::class, 'conferenceList']);
Route::post('store-conference', [UniversityAdministrationController::class, 'storeConference']);