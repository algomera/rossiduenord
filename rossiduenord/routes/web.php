<?php

use Illuminate\Support\Facades\Route;
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
//home
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/', 'pageController@index');

//Route Admin
Route::middleware('admin')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/dashboard', 'HomeController@adminHome')->name('dashboard');
});


//Route Financial
Route::middleware('financial')
->namespace('Financial')
->name('financial.')
->prefix('financial')
->group(function () {
    Route::get('/dashboard', 'HomeController@financialHome')->name('dashboard');
});


//Route Bank
Route::middleware('bank')
->namespace('Bank')
->name('bank.')
->prefix('bank')
->group(function () {
    Route::get('/dashboard', 'HomeController@bankHome')->name('dashboard');
    Route::resource('users', 'UserController');
    Route::resource('folder', 'FolderController');
    Route::resource('file', 'FileController');
    Route::resource('practice', 'PracticeController');
});


//Route Business
Route::middleware('business')
->namespace('Business')
->name('business.')
->prefix('business')
->group(function () {
    Route::get('/dashboard', 'HomeController@businessHome')->name('dashboard');
    Route::get('/data', 'HomeController@editbusinessData')->name('edit.data');
    Route::put('/data', 'HomeController@updatebusinessData')->name('update.data');
    Route::resource('/users', 'UserController');
    Route::resource('/folder', 'FolderController');
    Route::resource('/file', 'FileController');
    Route::resource('/applicant', 'ApplicantController');
    Route::resource('/practice', 'PracticeController');
    Route::resource('/subject', 'SubjectController');
    Route::resource('/building', 'BuildingController');
    Route::resource('superbonus', 'SuperBonusController');
    Route::get('superbonus/1', 'SuperBonusController@test')->name('test');
});


//Route Collaborator
Route::middleware('collaborator')
->namespace('Collaborator')
->name('collaborator.')
->prefix('collaborator')
->group(function () {
    Route::get('/dashboard', 'HomeController@collaboratorHome')->name('dashboard');
});


//Route Consultant
Route::middleware('consultant')
->namespace('Consultant')
->name('consultant.')
->prefix('consultant')
->group(function () {
    Route::get('/dashboard', 'HomeController@consultantHome')->name('dashboard');
});


//Route Asseverator
Route::middleware('asseverator')
->namespace('Asseverator')
->name('asseverator.')
->prefix('asseverator')
->group(function () {
    Route::get('/dashboard', 'HomeController@asseveratorHome')->name('dashboard');
});


//Route Manager
Route::middleware('manager')
->namespace('Manager')
->name('manager.')
->prefix('manager')
->group(function () {
    Route::get('/dashboard', 'HomeController@managerHome')->name('dashboard');
});


//Route Provider
Route::middleware('provider')
->namespace('Provider')
->name('provider.')
->prefix('provider')
->group(function () {
    Route::get('/dashboard', 'HomeController@providerHome')->name('dashboard');
});


//Route Agent
Route::middleware('agent')
->namespace('Agent')
->name('agent.')
->prefix('agent')
->group(function () {
    Route::get('/dashboard', 'HomeController@agentHome')->name('dashboard');
});


//Route Condominium
Route::middleware('condominium')
->namespace('Condominium')
->name('condominium.')
->prefix('condominium')
->group(function () {
    Route::get('/dashboard', 'HomeController@condominiumHome')->name('dashboard');
});



