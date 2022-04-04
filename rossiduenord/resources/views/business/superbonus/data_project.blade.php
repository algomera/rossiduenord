@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
    @include('business.layouts.partials.nav_superbonus')

            <form action="{{route('business.update_data_project', ['practice' => $practice])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Dati di Progetti</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                </div>

                <div class="dati_progetto px-20 pb-20">
                    <div class="d-flex">
                        <p>È stata depositata la relazione tecnica prevista dall’art. 28 della legge 10/91 e dall’art. 8 comma 1 del D.lgs 192/05 e successive modificazioni</p>
                        <label for="technical_report" style="margin-left: 20px"  class="px-2 form-check">
                            <input {{ $data_project->technical_report == 'notDefine' ? 'checked' : ''}} {{old('technical_report') == 'notDefine' ? 'checked' : ''}} type="radio" value="notDefine" class="form-check-input @error('technical_report') is-invalid @enderror" name="technical_report" id="technical_report">
                            N.D.
                        </label>
                        <label for="technical_report" style="margin-left: 20px" class="px-2">
                            <input {{ $data_project->technical_report == 'no' ? 'checked' : ''}} {{old('technical_report') == 'no' ? 'checked' : ''}} type="radio" value="no" class="form-check-input @error('technical_report') is-invalid @enderror" name="technical_report" id="technical_report">
                            No
                        </label>
                        <label for="technical_report" style="margin-left: 20px" class="px-2">
                            <input {{ $data_project->technical_report == 'yes' ? 'checked' : ''}} {{old('technical_report') == 'yes' ? 'checked' : ''}} type="radio" value="yes" class="form-check-input @error('technical_report') is-invalid @enderror" name="technical_report" id="technical_report">
                            Si
                        </label>
                    </div>
                    <div class="d-flex align-items-center mt-3"> 
                        <p style="margin: 0">è stata depositata nell’ufficio competente del Comune di</p> 
                        <div>
                            <input type="text" value="{{ old('filed_common') ?? $data_project->filed_common}}" name="filed_common" id="filed_common" style="margin-left: 20px; width: 150px;" class="text-center border form-control  @error('filed_common') is-invalid @enderror">
                            @error('filed_common')
                                <span class="invalid-feedback pl-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                          
                        <div class="h-100">
                            <label for="filed_province" style="margin: 0; padding-left: 20px;" class="d-flex align-items-center">
                                Prov.
                                <input type="text" value="{{old('filed_province') ?? $data_project->filed_province}}" name="filed_province" id="filed_province" class="text-center mx-2 border form-control  @error('filed_province') is-invalid @enderror">
                                @error('filed_province')
                                    <span class="invalid-feedback pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                        <div>
                            <label for="filed_date" style="margin: 0; padding-left: 10px;" class="d-flex align-items-center mx-2">
                                in data
                                <input type="date" value="{{old('filed_date') ?? $data_project->filed_date}}" name="filed_date" id="filed_date" class="text-center border  mx-1 w-75 form-control @error('filed_date') is-invalid @enderror">
                                @error('filed_date')
                                    <span class="invalid-feedback pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                        <div>
                            <label for="filed_protocol" style="margin: 0; padding-left: 10px;" class="d-flex align-items-center">
                                Protocollo n.
                                <input type="text" value="{{old('filed_protocol') ?? $data_project->filed_protocol}}" name="filed_protocol" id="filed_protocol" class="text-center border w-50 mx-2 form-control @error('filed_protocol') is-invalid @enderror">
                                @error('filed_protocol')
                                    <span class="invalid-feedback pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-5">  
                        <div class="form-group m-0" style="display:inline-block;" >
                            <label for="technical_report_exclusion" class="checkbox-wrapper d-flex mr-3">
                                <input {{ $data_project->technical_report_exclusion == 'true' ? 'checked' : ''}} {{old('technical_report_exclusion') == 'true' ? 'checked' : ''}} type="checkbox" class="@error('technical_report_exclusion') is-invalid @enderror" value="true" name="technical_report_exclusion" id="technical_report_exclusion">
                                <span class="checkmark"></span>
                                <p class="m-0">Non è stata depositata la relazione tecnica in quanto si ricade nei casi di esclusione previsti dal comma 1 dell’art. 8 del del D.lgs 192/05 e dal punto 2,
                                    paragrafo 2.2. dell’allegato 1 del decreto 26/06/2015
                                </p>
                                @error('intervention_tipology')
                                    <span class="invalid-feedback pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                    </div>

                    <div class="mt-5 d-flex align-items-center">
                        <div>
                            - gli stessi lavori sono iniziati in data
                       </div> 
                        <label for="work_start">
                            <input type="date" value="{{old('work_start') ?? $data_project->work_start}}" name="work_start" id="work_start" class="text-center border form-control ml-3 @error('work_start') is-invalid @enderror">
                            @error('work_start')
                                <div class="invalid-feedback pl-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </label>
                        <div class="ml-5">e conclusi in data</div>
                        <label for="end_of_works">
                            <input type="date" value="{{old('end_of_works') ?? $data_project->end_of_works}}" name="end_of_works" id="end_of_works" class="text-center border form-control ml-3 @error('end_of_works') is-invalid @enderror">
                            @error('end_of_works')
                                <div class="invalid-feedback pl-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </label>
                    </div>

                    <div>
                        <p class="m-0 mt-2">- i lavori sono eseguiti su:</p>
                        <div class="d-flex align-items-center">
                            <label for="type_building" class="">
                                <input {{ $data_project->type_building == 'condominium' ? 'checked' : ''}} {{old('type_building') == 'condominium' ? 'checked' : ''}} type="radio" value="condominium" name="type_building" id="type_building" class="mr-2 @error('type_building') is-invalid @enderror">
                                <span>Edificio condominiale composto da n. unità</span>
                                @error('type_building')
                                    <span class="invalid-feedback pl-3 pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>

                            <label for="building_unit" class="w-10 mr-5">
                                <input type="number" value="{{old('building_unit') ?? $data_project->building_unit}}" name="building_unit" id="building_unit" class="mx-3 text-center border form-control @error('building_unit') is-invalid @enderror">
                                @error('building_unit')
                                    <span class="invalid-feedback pl-3 pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>

                            <div class="h-100">
                                n.pertinenze
                            </div>

                            <label for="relevance" class="">
                                <input type="number" value="{{old('relevance') ?? $data_project->relevance}}" name="relevance" id="relevance" class="mx-3 text-center border form-control @error('relevance') is-invalid @enderror">
                                @error('relevance')
                                    <span class="invalid-feedback pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label for="centralized_system" class="checkbox-wrapper d-flex mx-5">
                                <input {{ $data_project->centralized_system == 'true' ? 'checked' : ''}} {{old('centralized_system') == 'true' ? 'checked' : ''}} type="checkbox" value="true" name="centralized_system" id="centralized_system" class="@error('centralized_system') is-invalid @enderror">
                                <span class="checkmark"></span>
                                con impianto termico centralizzato
                            </label>
                        </div>
                        <div>
                            <label for="type_building">
                                <input {{ $data_project->type_building == 'single_property' ? 'checked' : ''}} {{old('type_building') == 'single_property' ? 'checked' : ''}} type="radio" value="single_property" name="type_building" id="type_building" class="mr-2  @error('type_building') is-invalid @enderror">
                                <span>Unità immobiliare unifamiliare</span>
                                @error('type_building')
                                    <span class="invalid-feedback pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                        <div>
                            <label for="type_building">
                                <input {{ $data_project->type_building == 'multi_property' ? 'checked' : ''}} {{old('type_building') == 'multi_property' ? 'checked' : ''}} type="radio" value="multi_property" name="type_building" id="type_building" class="mr-2  @error('type_building') is-invalid @enderror">
                                <span>Unità immobiliari situate in edifici plurifamiliari</span>
                                @error('type_building')
                                    <span class="invalid-feedback pl-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <p class="m-0">- la superficie lorda ante lavori complessiva disperdente è pari a</p>
                        <div class="px-3">
                            <label for="gross_surface_area">
                                <input type="number" value="{{old('gross_surface_area') ?? $data_project->gross_surface_area}}" name="gross_surface_area" id="gross_surface_area" class="text-center border form-control @error('gross_surface_area') is-invalid @enderror">
                                <span>m²</span>
                                @error('gross_surface_area')
                                        <span class="invalid-feedback pl-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </label>
                        </div>
                    </div>

                    <div class="mt-5">
                        <b>Informazioni relative ai nuovi prezzi utilizzati nel computo metrico</b>
                        <hr style="margin-top: 5px; background-color: #211e16;">
                        <div class="d-flex">
                            <div class="d-flex flex-column justify-content-between mr-4">
                                <b>Numero voci NP utilizzate</b>
                                <b  style="color: #00cfb4;">- di cui validate</b>
                                <b style="color: #e4003c;">- di cui ancora da validare</b>
                            </div>
                            <div class="d-flex flex-column">
                                <input type="number" value="{{$data_project->np}}" name="np" id="np" style="width: 150px" class="text-center font-weight-bold mb-2 bg-light border">
                                <input type="number" value="{{$data_project->np_validated}}" name="np_validated" id="np_validated" style="width: 150px" class="text-center font-weight-bold mb-2 bg-light border">
                                <input type="number" value="{{$data_project->np_not_validated}}" name="np_not_validated" id="np_not_validated" style="width: 150px" class="text-center font-weight-bold bg-light border">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-fixed">
                    <a href="{{ route('business.practice.index') }}" class="add-button" style="background-color: #818387" >
                        {{ __('Annulla')}}
                    </a>
                    <button type="submit" class="add-button position-relative ml-2">
                        {{ __('Conferma') }}
                    </button>
                </div>
            </form>

        </div>{{-- chiusura div box praticeNav--}}

    </div>{{-- chiusura div content-main praticeNav --}}

@endsection
