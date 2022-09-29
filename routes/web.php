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
Route::get('conference-arrangement-requests',[AdminController::class, 'conferenceArrangementRequests']);

//Author
Route::get('author-paper-submission', [AuthorController::class, 'authorPaperSubmission']);

//Authentication and Authorization
Route::get('register/{user}', [AuthenticationAuthorizationController::class, 'createAccount']);

//University Administrator 
Route::get('create-conference-paper', [UniversityAdministrationController::class, 'createConferencePaper']);
Route::get('dashboard/{user}', [UniversityAdministrationController::class, 'showDashboard']);
Route::get('conference-list',[UniversityAdministrationController::class, 'conferenceList']);