<?php

use App\Condomini;
use App\Helpers\Interventi;
use App\Practice;
use Illuminate\Http\Request;
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
Route::middleware('guest')->get('/', function () {
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
    Route::get('/subject/{practice}', 'SubjectController@subject_edit')
    ->where('practice', '[0-9]+')->name('subject_edit');
    Route::resource('/subject', 'SubjectController');
    Route::resource('/building', 'BuildingController');
    Route::get('/superbonus/{practice}', 'SuperBonusController@index')
    ->where('practice', '[0-9]+')
    ->name('superbonus.index');
    Route::get('/superbonus/{practice}/{building}', 'SuperBonusController@show')
    ->where('practice', '[0-9]+')
    ->where('building', '[0-9]+')
    ->name('superbonus.show');
    Route::put('/superbonus/data_project/{practice}/update', 'SuperBonusController@update_data_project')
    ->where('practice', '[0-9]+')
    ->name('update_data_project');
    Route::get('/superbonus/driving_intervention/{practice}', 'SuperBonusController@driving_intervention')
    ->where('practice', '[0-9]+')
    ->name('driving_intervention');
    Route::put('/superbonus/driving_intervention/{practice}/update', 'SuperBonusController@update_driving_intervention')
    ->where('practice', '[0-9]+')
    ->name('update_driving_intervention');
    Route::get('/superbonus/towed_intervention/{practice}', 'SuperBonusController@towed_intervention')
    ->where('practice', '[0-9]+')
    ->name('towed_intervention');
    Route::put('/superbonus/towed_intervention/{practice}/update', 'SuperBonusController@update_towed_intervention')
    ->where('practice', '[0-9]+')
    ->name('update_towed_vertical_wall');
    Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')
    ->where('practice', '[0-9]+')
    ->name('final_state');
    Route::put('/superbonus/final_state/{practice}/update', 'SuperBonusController@update_final_state')
    ->where('practice', '[0-9]+')
    ->name('update_final_state');
    Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')
    ->where('practice', '[0-9]+')
    ->name('final_state');
    Route::get('/superbonus/fees_declaration/{practice}', 'SuperBonusController@fees_declaration')
    ->where('practice', '[0-9]+')
    ->name('fees_declaration');
    Route::get('/superbonus/var_computation/{practice}', 'SuperBonusController@var_computation')
    ->where('practice', '[0-9]+')
    ->name('var_computation');
    Route::put('/superbonus/var_computation/{practice}/update', 'SuperBonusController@update_var_computation')
    ->where('practice', '[0-9]+')
    ->name('update_var_computation');
    Route::resource('/verticalwall', 'VerticalWallController');
    Route::get('/medias/{practice}', 'MediaController@index')->name('medias');

    
    Route::post('/show_condomino_data/{id}', function ($id) {
        if($id === "null") {
            session()->remove('condominoId');
        } else {
            session()->put('condominoId', $id);
        }
    });

    Route::post('/save_condomino_data/{id}', function ($id, Request $request) {
        $pid = $request->get('practice');
        $practice = Practice::find($pid);
        // Update Condomino Datas
        if($id !== "common") {
            $data = json_decode($request->get('data'), true);
            $condomino = Condomini::find($id);
            $condomino->update($data);
        }
        // Update Interventi
        Interventi::addCondensingBoiler($practice, $request->get('interventi')['condensing_boilers']);
        Interventi::addHeatPump($practice, $request->get('interventi')['heat_pumps']);
        Interventi::addAbsorptionHeatPump($practice, $request->get('interventi')['absorption_heat_pumps']);
        Interventi::addHybridSystem($practice, $request->get('interventi')['hybrid_systems']);
        Interventi::addMicrogenerationSystem($practice, $request->get('interventi')['microgeneration_systems']);
        Interventi::addWaterHeatpumpsInstallation($practice, $request->get('interventi')['water_heatpumps_installations']);
        Interventi::addBiomeGenerator($practice, $request->get('interventi')['biome_generators']);
        Interventi::addSolarPanel($practice, $request->get('interventi')['solar_panels']);
        return "updated";
    });

    Route::delete('/condensing_boilers/{id}/delete', 'InterventionController@deleteCondensingBoilers');
    Route::delete('/heat_pumps/{id}/delete', 'InterventionController@deleteHeatPumps');
    Route::delete('/absorption_heat_pumps/{id}/delete', 'InterventionController@deleteAbsorptionHeatPumps');
    Route::delete('/hybrid_systems/{id}/delete', 'InterventionController@deleteHybridSystems');
    Route::delete('/microgeneration_systems/{id}/delete', 'InterventionController@deleteMicrogenerationSystems');
    Route::delete('/water_heatpumps_installations/{id}/delete', 'InterventionController@deleteWaterHeatpumpsInstallations');
    Route::delete('/biome_generators/{id}/delete', 'InterventionController@deleteBiomeGenerators');
    Route::delete('/solar_panels/{id}/delete', 'InterventionController@deleteSolarPanels');

    Route::get('/folder_document/{practice}', 'FolderDocumentController@index')->name('folder_document');
    Route::get('/folder_document/{practice}/{folder_document}', 'FolderDocumentController@show')->name('folder_show');
    Route::resource('/documents', 'DocumentController');
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
    Route::resource('practice', 'PracticeController');
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



