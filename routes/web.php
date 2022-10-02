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
Route::get('admin/tables/uni-admin', [AdminController::class, 'universityAdminTableView']);
Route::get('admin/tables/university', [AdminController::class, 'universityTableView']);

//Author
Route::get('author/submission', [AuthorController::class, 'authorPaperSubmission']);


//Authentication and Authorization
Route::get('login', [AuthenticationAuthorizationController::class, 'loginView']);
Route::post('login', [AuthenticationAuthorizationController::class, 'login']);
Route::get('register/{user}', [AuthenticationAuthorizationController::class, 'createAccount']);
Route::post('register/admin', [AuthenticationAuthorizationController::class, 'addUser']);


//University Administrator 
Route::get('uni-admin/create-conference-paper', [UniversityAdministrationController::class, 'createConferencePaper']);
Route::get('uni-admin/dashboard', [UniversityAdministrationController::class, 'showDashboard']);
Route::get('uni-admin/conference-list',[UniversityAdministrationController::class, 'conferenceList']);
Route::post('store-conference', [UniversityAdministrationController::class, 'storeConference']);
Route::get('uni-admin/edit-conference/{id}', [UniversityAdministrationController::class, 'editConference']);
Route::post('update-conference/{id}', [UniversityAdministrationController::class, 'updateConference']);
Route::get('uni-admin/create-admin', [UniversityAdministrationController::class, 'createAdmin']);
Route::post('store-admin', [UniversityAdministrationController::class, 'storeAdmin']);
Route::get('uni-admin/admin-list', [UniversityAdministrationController::class, 'adminList']);
Route::get('uni-admin/edit-admin-acc/{id}', [UniversityAdministrationController::class, 'editAdmin']);
Route::post('update-admin/{id}', [UniversityAdministrationController::class, 'updateAdmin']);
Route::get('uni-admin/delete-admin-acc/{id}', [UniversityAdministrationController::class, 'deleteAdmin']); 