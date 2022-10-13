<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthenticationAuthorizationController;
use App\Http\Controllers\UniversityAdministrationController;
use App\Http\Controllers\ReviewerController;

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
Route::get('admin/2iarpwu9',[AdminController::class, 'websiteAdminCreateView']);
Route::post('admin/2iarpwu9',[AdminController::class, 'websiteAdminCreateStore']);


Route::get('admin/dashbord',[AdminController::class, 'adminDashbord']);
Route::get('admin/register/uni-admin', [AdminController::class, 'universityAdminRegister']);
Route::post('admin/register/uni-admin/add', [AdminController::class, 'universityAdminAdd']);
Route::get('admin/tables/uni-admin', [AdminController::class, 'universityAdminTableView']);
Route::get('admin/tables/university', [AdminController::class, 'universityTableView']);
Route::get('admin/tables/conference', [AdminController::class, 'conferenceTableView']);


//Author
Route::get('author/dashboard', [AuthorController::class, 'authorDashbordView']);
Route::get('author/tables/conference', [AuthorController::class, 'availableConferenceView']);
Route::get('author/conference/{id}', [AuthorController::class, 'authorPaperConference']);
Route::post('author/submission/{id}', [AuthorController::class, 'authorPaperSubmissionStore']);
Route::get('author/tables/submission', [AuthorController::class, 'submissionTableView']);


//Authentication and Authorization
Route::get('login', [AuthenticationAuthorizationController::class, 'loginView']);
Route::post('login', [AuthenticationAuthorizationController::class, 'login']);
Route::get('logout', [AuthenticationAuthorizationController::class, 'logout']);
Route::get('register/{user}', [AuthenticationAuthorizationController::class, 'createAccount']);
Route::post('register/admin', [AuthenticationAuthorizationController::class, 'addUser']);
Route::post('register/author', [AuthenticationAuthorizationController::class, 'addUser']);
Route::post('register/reviewer', [AuthenticationAuthorizationController::class, 'addUser']);


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
Route::get('uni-admin/conference/table/submissions/{id}', [UniversityAdministrationController::class, 'conferenceSubmissionsView']);
Route::post('uni_admin/add-reviewer/{id}', [UniversityAdministrationController::class, 'addReviewerInSubmissionPaper']);

//Reviewer
Route::get('reviewer/dashboard', [ReviewerController::class, 'reviewerDashbordView']);
Route::get('reviewer/table/assigned-paper', [ReviewerController::class, 'assignedPaperView']);
Route::get('paper-download/{id}', [ReviewerController::class, 'paperDownload']);