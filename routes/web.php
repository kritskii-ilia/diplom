<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, "index"])->name('main-page');

Route::get('/sign-up',[PageController::class, "signup"])->name('signup-page');
Route::post('/sign-up',[UserController::class, "signup"])->name('signup');

Route::get('/login', [PageController::class, "login"])->name('login-page');
Route::post('/login', [UserController::class, "login"])->name('login');
Route::get('/logout', [UserController::class, "logout"])->name('logout');

Route::get('/profile',[PageController::class, "profile"])->name('profile-page');
Route::post('/profile', [UserController::class, "profile"])->name('profile');

Route::get('/projects', [PageController::class, "projects"])->name('projects');

Route::get('/project-add', [PageController::class, "project_add"])->name('project-add-page');
Route::post('/project-add', [ProjectController::class, "project_add"])->name('project-add');

Route::get('/project-single/{id}', [PageController::class, "project_single"])->name('project-single-page');

Route::get('/delete-project/{id}' ,[ProjectController::class, "delProject"])->name('delProject');

Route::get('/requests',[PageController::class, "requests"])->name('requests-page');
Route::get('/bets',[PageController::class, "bets"])->name('bets-page');

Route::get('/criterion', [PageController::class, "criterion"])->name('criterion-page');

Route::get('/request-wait/{id}',[RequestController::class, "reqWait"])->name('request-wait');
Route::get('/request-success/{id}',[RequestController::class, "reqSuccess"])->name('request-success');
Route::get('/request-denied/{id}',[RequestController::class, "reqDenied"])->name('request-denied');

Route::get('/add-request',[RequestController::class, "addReq"])->name('add-request');

Route::get('/editProject/{id}',[PageController::class, "editProject"])->name('project-edit-page');
Route::post('/editProject',[ProjectController::class, "editProject"])->name('project-edit');

Route::get('/search' ,[ProjectController::class , "search"])->name('search');

Route::post('/add-bet',[ProjectController::class, "addBet"])->name('add-bet');
