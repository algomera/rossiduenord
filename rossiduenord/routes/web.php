<?php

	use App\Condomini;
	use App\Helpers\Interventi;
	use App\Practice;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Storage;
	use App\Photo;
	use App\Http\Resources\PhotoResource;

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
	Route::middleware('admin')->namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
			Route::get('/dashboard', 'HomeController@adminHome')->name('dashboard');
			Route::resource('/practice', 'PracticeController');
			Route::resource('/users', 'UserController');
			Route::resource('/folder', 'FolderController');
			Route::resource('/file', 'FileController');
			Route::resource('/anagrafiche', 'AnagraficheController');
			Route::get('/anagrafiche/{anagrafica:id}/view', 'AnagraficheController@loadModal')->name('anagrafiche.view');
		});
	//Route Financial
	Route::middleware('financial')->namespace('Financial')->name('financial.')->prefix('financial')->group(function () {
			Route::get('/dashboard', 'HomeController@financialHome')->name('dashboard');
		});
	//Route Bank
	Route::middleware('bank')->namespace('Bank')->name('bank.')->prefix('bank')->group(function () {
			Route::get('/dashboard', 'HomeController@bankHome')->name('dashboard');
			Route::resource('users', 'UserController');
			Route::resource('folder', 'FolderController');
			Route::resource('file', 'FileController');
			Route::resource('practice', 'PracticeController');
		});
	//Route Business
	Route::middleware(['role_or_permission:admin|business|access_practices'])->namespace('Business')->name('business.')->prefix('business')->group(function () {
			Route::get('/dashboard', 'HomeController@businessHome')->name('dashboard');
			Route::get('/data', 'HomeController@editbusinessData')->name('edit.data');
			Route::put('/data', 'HomeController@updatebusinessData')->name('update.data');
			Route::resource('/users', 'UserController');
			Route::resource('/folder', 'FolderController');
			Route::resource('/file', 'FileController');
			Route::resource('/applicant', 'ApplicantController');
			Route::resource('/practice', 'PracticeController');
			//practice
			Route::get('/subject/{practice}', 'SubjectController@subject_edit')->where('practice', '[0-9]+')->name('subject_edit');
			//subject
			Route::resource('/subject', 'SubjectController');
			Route::post('/subject/{practice}/set', 'SubjectController@setSubject');
			//building
			Route::resource('/building', 'BuildingController');
			//superbonus
			Route::get('/superbonus/{practice}', 'SuperBonusController@index')->where('practice', '[0-9]+')->name('superbonus.index');
			Route::get('/superbonus/{practice}/{building}', 'SuperBonusController@show')->where('practice', '[0-9]+')->where('building', '[0-9]+')->name('superbonus.show');
			Route::put('/superbonus/data_project/{practice}/update', 'SuperBonusController@update_data_project')->where('practice', '[0-9]+')->name('update_data_project');
			Route::get('/superbonus/driving_intervention/{practice}/{type?}', 'SuperBonusController@driving_intervention')->where('practice', '[0-9]+')->name('driving_intervention');
			Route::put('/superbonus/driving_intervention/{practice}/update', 'SuperBonusController@update_driving_intervention')->where('practice', '[0-9]+')->name('update_driving_intervention');
			Route::get('/superbonus/towed_intervention/{practice}/{condomino?}/{type?}', 'SuperBonusController@towed_intervention')->where('practice', '[0-9]+')->name('towed_intervention');
			Route::put('/superbonus/towed_intervention/{practice}/update', 'SuperBonusController@update_towed_intervention')->where('practice', '[0-9]+')->name('update_towed_vertical_wall');
			Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')->where('practice', '[0-9]+')->name('final_state');
			Route::put('/superbonus/final_state/{practice}/update', 'SuperBonusController@update_final_state')->where('practice', '[0-9]+')->name('update_final_state');
			Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')->where('practice', '[0-9]+')->name('final_state');
			Route::get('/superbonus/fees_declaration/{practice}', 'SuperBonusController@fees_declaration')->where('practice', '[0-9]+')->name('fees_declaration');
			Route::get('/superbonus/var_computation/{practice}', 'SuperBonusController@var_computation')->where('practice', '[0-9]+')->name('var_computation');
			Route::put('/superbonus/var_computation/{practice}/update', 'SuperBonusController@update_var_computation')->where('practice', '[0-9]+')->name('update_var_computation');
			//vertical wall
			Route::resource('/verticalwall', 'VerticalWallController');
			//media
			Route::get('/medias/{practice}', 'MediaController@index')->name('medias');
			Route::get('photos_practice', function (Request $request) {
				$user = $request->user()->id;
				$practice = Practice::where('user_id', $user)->pluck('id');
				$photos = Photo::where('practice_id', $practice)->get();
				return PhotoResource::collection($photos);
			});
			Route::post('/save_type_data/{type}', function ($type, Request $request) {
				$pid = $request->get('practice');
				$practice = Practice::find($pid);
				$items = $request->get('surfaces');
				foreach ($items as $i => $item) {
					if (is_numeric($i)) {
						$practice->surfaces()->create($item);
					} else if (is_string($i)) {
						$pn = explode('-', $i)[0];
						$sn = explode('-', $i)[1];
						$practice->surfaces()->updateOrCreate(['id' => $sn, 'practice_id' => $pn], ["is_common" => $item['is_common'] ?? false, "condomino_id" => $item['condomino_id'], "type" => $item['type'], "intervention" => $item['intervention'], "description_surface" => $item['description_surface'], "surface" => $item['surface'], "trasm_ante" => $item['trasm_ante'], "trasm_post" => $item['trasm_post'], "trasm_term" => $item['trasm_term'], "confine" => $item['confine'], "insulation" => $item['insulation'],]);
					}
				}
			});
			Route::delete('/surface/{id}/delete', 'SuperBonusController@delete_surface');
			Route::post('/save_condomino_data/{id}', function ($id, Request $request) {
				$pid = $request->get('practice');
				$practice = Practice::find($pid);
				// Update Condomino Datas
				if ($id !== "common") {
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
			Route::get('/download/excel/{practiceId}', 'BuildingController@downloadExcel')->name('downloadExcel');
			Route::delete('/delete/excel/{practiceId}', 'BuildingController@deleteExcel')->name('deleteExcel');
			// Intervention delete
			Route::delete('/condensing_boilers/{id}/delete', 'InterventionController@deleteCondensingBoilers');
			Route::delete('/heat_pumps/{id}/delete', 'InterventionController@deleteHeatPumps');
			Route::delete('/absorption_heat_pumps/{id}/delete', 'InterventionController@deleteAbsorptionHeatPumps');
			Route::delete('/hybrid_systems/{id}/delete', 'InterventionController@deleteHybridSystems');
			Route::delete('/microgeneration_systems/{id}/delete', 'InterventionController@deleteMicrogenerationSystems');
			Route::delete('/water_heatpumps_installations/{id}/delete', 'InterventionController@deleteWaterHeatpumpsInstallations');
			Route::delete('/biome_generators/{id}/delete', 'InterventionController@deleteBiomeGenerators');
			Route::delete('/solar_panels/{id}/delete', 'InterventionController@deleteSolarPanels');
			// folder document
			Route::get('/folder_document/{practice}/{folder_document}', 'FolderDocumentController@show')->name('folderDocument.show');
			Route::get('/folder_document/{practice}/{folder_document}/{sub_folder}', 'FolderDocumentController@show_document')->name('document.show');
			Route::post('/folder_document/{practice}/{folder_document}/{sub_folder}/store', 'FolderDocumentController@store')->name('document.store');
			Route::get('/doument/download/{document}', 'FolderDocumentController@downloadDocument')->name('document.download');
			Route::delete('/folder_document/{practice}/{folder_document}/{sub_folder}/{document}/delete', 'FolderDocumentController@destroy')->name('document.destroy');
			// condomini export
			Route::get('/condomini_export/{practice}', 'CondominiController@export')->name('condomini.export');
			// anagrafiche
			Route::get('/anagrafiche', 'AnagraficheController@index')->name('anagrafiche.index');
			Route::post('/anagrafiche', 'AnagraficheController@store')->name('anagrafiche.store');
			Route::get('/anagrafiche/create', 'AnagraficheController@create')->name('anagrafiche.create');
			Route::get('/anagrafiche/{anagrafica}/edit', 'AnagraficheController@edit')->name('anagrafiche.edit');
			Route::put('/anagrafiche/{anagrafica}', 'AnagraficheController@update')->name('anagrafiche.update');
			Route::get('/anagrafiche/{anagrafica:id}/view', 'AnagraficheController@loadModal')->name('anagrafiche.view');
			//contract
			Route::get('/contracts/{practice}', 'ContractController@originalIndex')->name('contracts.index');
			Route::get('/contracts/signed/{contract}', 'ContractController@signedIndex')->name('signed.index');
			Route::post('/new/signed/{contract}', 'ContractController@signedStore')->name('signed.store');
			Route::get('/signed/{signed}', 'ContractController@signedShow')->name('signed.show');
			Route::get('/contract/download/{id}', 'ContractController@contractDownload')->name('contract.download');
			Route::get('/contract/signed/download/{id}', 'ContractController@signedDownload')->name('signed.download');
			Route::delete('/signed/delete/{signed}', 'ContractController@deleteSigned')->name('contracts.signed.delete');
			//policies
			Route::get('/policies/{practice}', 'PolicyController@index')->name('policies.index');
			Route::get('/policy/download/{id}', 'PolicyController@policyDownload')->name('policy.download');
			Route::get('/policies/signed/{policy}', 'PolicyController@signedIndex')->name('policies.signed');
			Route::post('/new/signedpolicy/{policy}', 'PolicyController@signedStore')->name('policies.signed.store');
			Route::get('/policies/modified/{id}/download', 'PolicyController@modifiedDownload')->name('modified.download');
			Route::get('/policies/modified/{modified}', 'PolicyController@modifiedShow')->name('modified.show');
			Route::delete('/modified/delete/{modified}', 'PolicyController@deleteModified')->name('policies.modified.delete');
		});
	//Route::middleware('business')
	//->namespace('Business')
	//->name('business.')
	//->prefix('business')
	//->group(function () {
	//    Route::get('/dashboard', 'HomeController@businessHome')->name('dashboard');
	//    Route::get('/data', 'HomeController@editbusinessData')->name('edit.data');
	//    Route::put('/data', 'HomeController@updatebusinessData')->name('update.data');
	//    Route::resource('/users', 'UserController');
	//    Route::resource('/folder', 'FolderController');
	//    Route::resource('/file', 'FileController');
	//    Route::resource('/applicant', 'ApplicantController');
	//    Route::resource('/practice', 'PracticeController');
	//
	//    //practice
	//    Route::get('/subject/{practice}', 'SubjectController@subject_edit')
	//    ->where('practice', '[0-9]+')->name('subject_edit');
	//    //subject
	//    Route::resource('/subject', 'SubjectController');
	//    Route::post('/subject/{practice}/set', 'SubjectController@setSubject');
	//    //building
	//    Route::resource('/building', 'BuildingController');
	//    //superbonus
	//    Route::get('/superbonus/{practice}', 'SuperBonusController@index')
	//    ->where('practice', '[0-9]+')
	//    ->name('superbonus.index');
	//    Route::get('/superbonus/{practice}/{building}', 'SuperBonusController@show')
	//    ->where('practice', '[0-9]+')
	//    ->where('building', '[0-9]+')
	//    ->name('superbonus.show');
	//    Route::put('/superbonus/data_project/{practice}/update', 'SuperBonusController@update_data_project')
	//    ->where('practice', '[0-9]+')
	//    ->name('update_data_project');
	//    Route::get('/superbonus/driving_intervention/{practice}/{type?}', 'SuperBonusController@driving_intervention')
	//    ->where('practice', '[0-9]+')
	//    ->name('driving_intervention');
	//    Route::put('/superbonus/driving_intervention/{practice}/update', 'SuperBonusController@update_driving_intervention')
	//    ->where('practice', '[0-9]+')
	//    ->name('update_driving_intervention');
	//    Route::get('/superbonus/towed_intervention/{practice}/{condomino?}/{type?}', 'SuperBonusController@towed_intervention')
	//    ->where('practice', '[0-9]+')
	//    ->name('towed_intervention');
	//    Route::put('/superbonus/towed_intervention/{practice}/update', 'SuperBonusController@update_towed_intervention')
	//    ->where('practice', '[0-9]+')
	//    ->name('update_towed_vertical_wall');
	//    Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')
	//    ->where('practice', '[0-9]+')
	//    ->name('final_state');
	//    Route::put('/superbonus/final_state/{practice}/update', 'SuperBonusController@update_final_state')
	//    ->where('practice', '[0-9]+')
	//    ->name('update_final_state');
	//    Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')
	//    ->where('practice', '[0-9]+')
	//    ->name('final_state');
	//    Route::get('/superbonus/fees_declaration/{practice}', 'SuperBonusController@fees_declaration')
	//    ->where('practice', '[0-9]+')
	//    ->name('fees_declaration');
	//    Route::get('/superbonus/var_computation/{practice}', 'SuperBonusController@var_computation')
	//    ->where('practice', '[0-9]+')
	//    ->name('var_computation');
	//    Route::put('/superbonus/var_computation/{practice}/update', 'SuperBonusController@update_var_computation')
	//    ->where('practice', '[0-9]+')
	//    ->name('update_var_computation');
	//    //vertical wall
	//    Route::resource('/verticalwall', 'VerticalWallController');
	//    //media
	//    Route::get('/medias/{practice}', 'MediaController@index')->name('medias');
	//    Route::get('photos_practice', function(Request $request) {
	//        $user = $request->user()->id;
	//        $practice = Practice::where('user_id', $user)->pluck('id');
	//        $photos = Photo::where('practice_id', $practice)->get();
	//
	//        return PhotoResource::collection($photos);
	//     });
	//    Route::post('/save_type_data/{type}', function ($type, Request $request) {
	//        $pid = $request->get('practice');
	//        $practice = Practice::find($pid);
	//        $items = $request->get('surfaces');
	//        foreach ($items as $i => $item) {
	//            if(is_numeric($i)) {
	//                $practice->surfaces()->create($item);
	//            } else if(is_string($i)) {
	//                $pn = explode('-', $i)[0];
	//                $sn = explode('-', $i)[1];
	//                $practice->surfaces()->updateOrCreate([
	//                    'id' => $sn,
	//                    'practice_id' => $pn
	//                ],
	//                [
	//                    "is_common" => $item['is_common'] ?? false,
	//                    "condomino_id" => $item['condomino_id'],
	//                    "type" => $item['type'],
	//                    "intervention" => $item['intervention'],
	//                    "description_surface" => $item['description_surface'],
	//                    "surface" => $item['surface'],
	//                    "trasm_ante" => $item['trasm_ante'],
	//                    "trasm_post" => $item['trasm_post'],
	//                    "trasm_term" => $item['trasm_term'],
	//                    "confine" => $item['confine'],
	//                    "insulation" => $item['insulation'],
	//                ]);
	//            }
	//        }
	//    });
	//
	//    Route::delete('/surface/{id}/delete', 'SuperBonusController@delete_surface');
	//
	//    Route::post('/save_condomino_data/{id}', function ($id, Request $request) {
	//        $pid = $request->get('practice');
	//        $practice = Practice::find($pid);
	//        // Update Condomino Datas
	//        if($id !== "common") {
	//            $data = json_decode($request->get('data'), true);
	//            $condomino = Condomini::find($id);
	//            $condomino->update($data);
	//        }
	//        // Update Interventi
	//        Interventi::addCondensingBoiler($practice, $request->get('interventi')['condensing_boilers']);
	//        Interventi::addHeatPump($practice, $request->get('interventi')['heat_pumps']);
	//        Interventi::addAbsorptionHeatPump($practice, $request->get('interventi')['absorption_heat_pumps']);
	//        Interventi::addHybridSystem($practice, $request->get('interventi')['hybrid_systems']);
	//        Interventi::addMicrogenerationSystem($practice, $request->get('interventi')['microgeneration_systems']);
	//        Interventi::addWaterHeatpumpsInstallation($practice, $request->get('interventi')['water_heatpumps_installations']);
	//        Interventi::addBiomeGenerator($practice, $request->get('interventi')['biome_generators']);
	//        Interventi::addSolarPanel($practice, $request->get('interventi')['solar_panels']);
	//        return "updated";
	//    });
	//
	//    Route::get('/download/excel/{practiceId}', 'BuildingController@downloadExcel')->name('downloadExcel');
	//    Route::delete('/delete/excel/{practiceId}', 'BuildingController@deleteExcel')->name('deleteExcel');
	//
	//    // Intervention delete
	//    Route::delete('/condensing_boilers/{id}/delete', 'InterventionController@deleteCondensingBoilers');
	//    Route::delete('/heat_pumps/{id}/delete', 'InterventionController@deleteHeatPumps');
	//    Route::delete('/absorption_heat_pumps/{id}/delete', 'InterventionController@deleteAbsorptionHeatPumps');
	//    Route::delete('/hybrid_systems/{id}/delete', 'InterventionController@deleteHybridSystems');
	//    Route::delete('/microgeneration_systems/{id}/delete', 'InterventionController@deleteMicrogenerationSystems');
	//    Route::delete('/water_heatpumps_installations/{id}/delete', 'InterventionController@deleteWaterHeatpumpsInstallations');
	//    Route::delete('/biome_generators/{id}/delete', 'InterventionController@deleteBiomeGenerators');
	//    Route::delete('/solar_panels/{id}/delete', 'InterventionController@deleteSolarPanels');
	//
	//    // folder document
	//    Route::get('/folder_document/{practice}/{folder_document}', 'FolderDocumentController@show')->name('folderDocument.show');
	//    Route::get('/folder_document/{practice}/{folder_document}/{sub_folder}', 'FolderDocumentController@show_document')->name('document.show');
	//    Route::post('/folder_document/{practice}/{folder_document}/{sub_folder}/store', 'FolderDocumentController@store')->name('document.store');
	//    Route::get('/doument/download/{document}', 'FolderDocumentController@downloadDocument')->name('document.download');
	//    Route::delete('/folder_document/{practice}/{folder_document}/{sub_folder}/{document}/delete', 'FolderDocumentController@destroy')->name('document.destroy');
	//
	//    // condomini export
	//    Route::get('/condomini_export/{practice}', 'CondominiController@export')->name('condomini.export');
	//
	//    // anagrafiche
	//    Route::get('/anagrafiche', 'AnagraficheController@index')->name('anagrafiche.index');
	//    Route::post('/anagrafiche', 'AnagraficheController@store')->name('anagrafiche.store');
	//    Route::get('/anagrafiche/create', 'AnagraficheController@create')->name('anagrafiche.create');
	//    Route::get('/anagrafiche/{anagrafica}/edit', 'AnagraficheController@edit')->name('anagrafiche.edit');
	//    Route::put('/anagrafiche/{anagrafica}', 'AnagraficheController@update')->name('anagrafiche.update');
	//    Route::get('/anagrafiche/{anagrafica:id}/view', 'AnagraficheController@loadModal')->name('anagrafiche.view');
	//
	//    //contract
	//    Route::get('/contracts/{practice}','ContractController@originalIndex')->name('contracts.index');
	//    Route::get('/contracts/signed/{contract}','ContractController@signedIndex')->name('signed.index');
	//    Route::post('/new/signed/{contract}','ContractController@signedStore')->name('signed.store');
	//    Route::get('/signed/{signed}','ContractController@signedShow')->name('signed.show');
	//    Route::get('/contract/download/{id}','ContractController@contractDownload')->name('contract.download');
	//    Route::get('/contract/signed/download/{id}','ContractController@signedDownload')->name('signed.download');
	//    Route::delete('/signed/delete/{signed}','ContractController@deleteSigned')->name('contracts.signed.delete');
	//
	//    //policies
	//    Route::get('/policies/{practice}', 'PolicyController@index')->name('policies.index');
	//    Route::get('/policy/download/{id}','PolicyController@policyDownload')->name('policy.download');
	//    Route::get('/policies/signed/{policy}', 'PolicyController@signedIndex')->name('policies.signed');
	//    Route::post('/new/signedpolicy/{policy}', 'PolicyController@signedStore')->name('policies.signed.store');
	//    Route::get('/policies/modified/{id}/download','PolicyController@modifiedDownload')->name('modified.download');
	//    Route::get('/policies/modified/{modified}','PolicyController@modifiedShow')->name('modified.show');
	//    Route::delete('/modified/delete/{modified}','PolicyController@deleteModified')->name('policies.modified.delete');
	//});
	//Route Collaborator
	Route::middleware('collaborator')->namespace('Collaborator')->name('collaborator.')->prefix('collaborator')->group(function () {
			Route::get('/dashboard', 'HomeController@collaboratorHome')->name('dashboard');
		});
	//Route Consultant
	Route::middleware('consultant')->namespace('Consultant')->name('consultant.')->prefix('consultant')->group(function () {
			Route::get('/dashboard', 'HomeController@consultantHome')->name('dashboard');
		});
	//Route Asseverator
	Route::middleware(['role_or_permission:admin|asseverator|access_practices'])->namespace('Asseverator')->name('asseverator.')->prefix('asseverator')->group(function () {
			Route::get('/dashboard', 'HomeController@asseveratorHome')->name('dashboard');
			Route::get('/data', 'HomeController@editbusinessData')->name('edit.data');
			Route::put('/data', 'HomeController@updatebusinessData')->name('update.data');
			Route::resource('/users', 'UserController');
			Route::resource('/folder', 'FolderController');
			Route::resource('/file', 'FileController');
			Route::resource('/applicant', 'ApplicantController');
			Route::resource('/practice', 'PracticeController');
			//practice
			Route::get('/subject/{practice}', 'SubjectController@subject_edit')->where('practice', '[0-9]+')->name('subject_edit');
			//subject
			Route::resource('/subject', 'SubjectController');
			Route::post('/subject/{practice}/set', 'SubjectController@setSubject');
			//building
			Route::resource('/building', 'BuildingController');
			//superbonus
			Route::get('/superbonus/{practice}', 'SuperBonusController@index')->where('practice', '[0-9]+')->name('superbonus.index');
			Route::get('/superbonus/{practice}/{building}', 'SuperBonusController@show')->where('practice', '[0-9]+')->where('building', '[0-9]+')->name('superbonus.show');
			Route::put('/superbonus/data_project/{practice}/update', 'SuperBonusController@update_data_project')->where('practice', '[0-9]+')->name('update_data_project');
			Route::get('/superbonus/driving_intervention/{practice}/{type?}', 'SuperBonusController@driving_intervention')->where('practice', '[0-9]+')->name('driving_intervention');
			Route::put('/superbonus/driving_intervention/{practice}/update', 'SuperBonusController@update_driving_intervention')->where('practice', '[0-9]+')->name('update_driving_intervention');
			Route::get('/superbonus/towed_intervention/{practice}/{condomino?}/{type?}', 'SuperBonusController@towed_intervention')->where('practice', '[0-9]+')->name('towed_intervention');
			Route::put('/superbonus/towed_intervention/{practice}/update', 'SuperBonusController@update_towed_intervention')->where('practice', '[0-9]+')->name('update_towed_vertical_wall');
			Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')->where('practice', '[0-9]+')->name('final_state');
			Route::put('/superbonus/final_state/{practice}/update', 'SuperBonusController@update_final_state')->where('practice', '[0-9]+')->name('update_final_state');
			Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')->where('practice', '[0-9]+')->name('final_state');
			Route::get('/superbonus/fees_declaration/{practice}', 'SuperBonusController@fees_declaration')->where('practice', '[0-9]+')->name('fees_declaration');
			Route::get('/superbonus/var_computation/{practice}', 'SuperBonusController@var_computation')->where('practice', '[0-9]+')->name('var_computation');
			Route::put('/superbonus/var_computation/{practice}/update', 'SuperBonusController@update_var_computation')->where('practice', '[0-9]+')->name('update_var_computation');
			//vertical wall
			Route::resource('/verticalwall', 'VerticalWallController');
			//media
			Route::get('/medias/{practice}', 'MediaController@index')->name('medias');
			Route::get('photos_practice', function (Request $request) {
				$user = $request->user()->id;
				$practice = Practice::where('user_id', $user)->pluck('id');
				$photos = Photo::where('practice_id', $practice)->get();
				return PhotoResource::collection($photos);
			});
			Route::post('/save_type_data/{type}', function ($type, Request $request) {
				$pid = $request->get('practice');
				$practice = Practice::find($pid);
				$items = $request->get('surfaces');
				foreach ($items as $i => $item) {
					if (is_numeric($i)) {
						$practice->surfaces()->create($item);
					} else if (is_string($i)) {
						$pn = explode('-', $i)[0];
						$sn = explode('-', $i)[1];
						$practice->surfaces()->updateOrCreate(['id' => $sn, 'practice_id' => $pn], ["is_common" => $item['is_common'] ?? false, "condomino_id" => $item['condomino_id'], "type" => $item['type'], "intervention" => $item['intervention'], "description_surface" => $item['description_surface'], "surface" => $item['surface'], "trasm_ante" => $item['trasm_ante'], "trasm_post" => $item['trasm_post'], "trasm_term" => $item['trasm_term'], "confine" => $item['confine'], "insulation" => $item['insulation'],]);
					}
				}
			});
			Route::delete('/surface/{id}/delete', 'SuperBonusController@delete_surface');
			Route::post('/save_condomino_data/{id}', function ($id, Request $request) {
				$pid = $request->get('practice');
				$practice = Practice::find($pid);
				// Update Condomino Datas
				if ($id !== "common") {
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
			Route::get('/download/excel/{practiceId}', 'BuildingController@downloadExcel')->name('downloadExcel');
			Route::delete('/delete/excel/{practiceId}', 'BuildingController@deleteExcel')->name('deleteExcel');
			// Intervention delete
			Route::delete('/condensing_boilers/{id}/delete', 'InterventionController@deleteCondensingBoilers');
			Route::delete('/heat_pumps/{id}/delete', 'InterventionController@deleteHeatPumps');
			Route::delete('/absorption_heat_pumps/{id}/delete', 'InterventionController@deleteAbsorptionHeatPumps');
			Route::delete('/hybrid_systems/{id}/delete', 'InterventionController@deleteHybridSystems');
			Route::delete('/microgeneration_systems/{id}/delete', 'InterventionController@deleteMicrogenerationSystems');
			Route::delete('/water_heatpumps_installations/{id}/delete', 'InterventionController@deleteWaterHeatpumpsInstallations');
			Route::delete('/biome_generators/{id}/delete', 'InterventionController@deleteBiomeGenerators');
			Route::delete('/solar_panels/{id}/delete', 'InterventionController@deleteSolarPanels');
			// folder document
			Route::get('/folder_document/{practice}/{folder_document}', 'FolderDocumentController@show')->name('folderDocument.show');
			Route::get('/folder_document/{practice}/{folder_document}/{sub_folder}', 'FolderDocumentController@show_document')->name('document.show');
			Route::get('/folder_document/{practice}/{folder_document}/{sub_folder}/approve', 'FolderDocumentController@approve_sub_folder')->name('document.approve');
			Route::get('/folder_document/{practice}/{folder_document}/{sub_folder}/disapprove', 'FolderDocumentController@disapprove_sub_folder')->name('document.disapprove');
			Route::post('/folder_document/{practice}/{folder_document}/{sub_folder}/store', 'FolderDocumentController@store')->name('document.store');
			Route::get('/doument/download/{document}', 'FolderDocumentController@downloadDocument')->name('document.download');
			Route::delete('/folder_document/{practice}/{folder_document}/{sub_folder}/{document}/delete', 'FolderDocumentController@destroy')->name('document.destroy');
			// condomini export
			Route::get('/condomini_export/{practice}', 'CondominiController@export')->name('condomini.export');
			// anagrafiche
			Route::get('/anagrafiche', 'AnagraficheController@index')->name('anagrafiche.index');
			Route::post('/anagrafiche', 'AnagraficheController@store')->name('anagrafiche.store');
			Route::get('/anagrafiche/create', 'AnagraficheController@create')->name('anagrafiche.create');
			Route::get('/anagrafiche/{anagrafica}/edit', 'AnagraficheController@edit')->name('anagrafiche.edit');
			Route::put('/anagrafiche/{anagrafica}', 'AnagraficheController@update')->name('anagrafiche.update');
			Route::get('/anagrafiche/{anagrafica:id}/view', 'AnagraficheController@loadModal')->name('anagrafiche.view');
			//contract
			Route::get('/contracts/{practice}', 'ContractController@originalIndex')->name('contracts.index');
			Route::get('/contracts/signed/{contract}', 'ContractController@signedIndex')->name('signed.index');
			Route::post('/new/signed/{contract}', 'ContractController@signedStore')->name('signed.store');
			Route::get('/signed/{signed}', 'ContractController@signedShow')->name('signed.show');
			Route::get('/contract/download/{id}', 'ContractController@contractDownload')->name('contract.download');
			Route::get('/contract/signed/download/{id}', 'ContractController@signedDownload')->name('signed.download');
			Route::delete('/signed/delete/{signed}', 'ContractController@deleteSigned')->name('contracts.signed.delete');
			//policies
			Route::get('/policies/{practice}', 'PolicyController@index')->name('policies.index');
			Route::get('/policy/download/{id}', 'PolicyController@policyDownload')->name('policy.download');
			Route::get('/policies/signed/{policy}', 'PolicyController@signedIndex')->name('policies.signed');
			Route::post('/new/signedpolicy/{policy}', 'PolicyController@signedStore')->name('policies.signed.store');
			Route::get('/policies/modified/{id}/download', 'PolicyController@modifiedDownload')->name('modified.download');
			Route::get('/policies/modified/{modified}', 'PolicyController@modifiedShow')->name('modified.show');
			Route::delete('/modified/delete/{modified}', 'PolicyController@deleteModified')->name('policies.modified.delete');
		});
	//Route::middleware('asseverator')
	//->namespace('Asseverator')
	//->name('asseverator.')
	//->prefix('asseverator')
	//->group(function () {
	//    Route::get('/dashboard', 'HomeController@asseveratorHome')->name('dashboard');
	//    Route::resource('practice', 'PracticeController');
	//    //Route::get('/practice{practice}', 'PracticeController@show')->name('practice');
	//});
	//Route Manager
	Route::middleware('manager')->namespace('Manager')->name('manager.')->prefix('manager')->group(function () {
			Route::get('/dashboard', 'HomeController@managerHome')->name('dashboard');
		});
	//Route Provider
	Route::middleware('provider')->namespace('Provider')->name('provider.')->prefix('provider')->group(function () {
			Route::get('/dashboard', 'HomeController@providerHome')->name('dashboard');
		});
	//Route Agent
	Route::middleware('agent')->namespace('Agent')->name('agent.')->prefix('agent')->group(function () {
			Route::get('/dashboard', 'HomeController@agentHome')->name('dashboard');
		});
	//Route Condominium
	Route::middleware('condominium')->namespace('Condominium')->name('condominium.')->prefix('condominium')->group(function () {
			Route::get('/dashboard', 'HomeController@condominiumHome')->name('dashboard');
		});



